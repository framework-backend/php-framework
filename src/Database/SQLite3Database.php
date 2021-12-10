<?php

namespace Framework\Database;

use Framework\Database\Interface\DatabaseInterface;
use ReflectionClass;
use SQLite3;

class SQLite3Database extends SQLite3 implements DatabaseInterface {

    private array $entities = [];

    public function registerEntity( string $entityClassName ) : void {
        $columns = [];

        $reflectionClass = new ReflectionClass( $entityClassName );
        $reflectionsProperties = $reflectionClass->getProperties();
        foreach ($reflectionsProperties as $reflectionProperty) {
            $propertyName = $reflectionProperty->getName();
            $columns[$propertyName] = [];

            $reflectionAttributes = $reflectionProperty->getAttributes();
            foreach ($reflectionAttributes as $reflectionAttribute) {
                $columns[$propertyName] = $reflectionAttribute->newInstance();
            }
        }

        $tableName = $this->getTaleName( $entityClassName );
        $this->entities[ $tableName ] = $columns;
    }

    public function migrate() : bool {
        $r = false;

        foreach ($this->entities as $entityName => $entityColumns) {
            $statement = "CREATE TABLE IF NOT EXISTS $entityName (\n\t";

            foreach ($entityColumns as $key => $column) {
                $statement .= $key . ' ';

                switch ($column->getType()) {
                    case 'integer':
                        $statement .= 'INTEGER';
                        break;
                    case 'string':
                        $length = $column->getLength() ?? 255;
                        $statement .= "VARCHAR($length)";
                        break;
                    case 'text':
                        $statement .= "TEXT";
                        break;
                    default:
                        break;
                }

                if ($column->getPrimaryKey()) {
                    $statement .= ' PRIMARY KEY NOT NULL';
                } else {
                    $statement .= $column->getNullable() ? ' DEFAULT NULL' : ' NOT NULL';
                }

                $statement .= ",\n\t";
            }

            $statement = substr($statement, 0, -3);
            $statement .= "\n)";

            $r = $this->exec( $statement );
            if (!$r) break;
        }

        return $r;
    }

    public function reset() : bool {
        $r = false;

        foreach ( array_keys( $this->entities ) as $entityName ) {
            $r = $this->exec( "DROP TABLE IF EXISTS $entityName" );
            if ( !$r ) break;
        }

        return $r;
    }

    public function create( string $entityClassName, array $attributes = [] ) : array | false {
        $tableName = $this->getTaleName( $entityClassName );
        $entityColumns = $this->entities[ $tableName ];

        $query = 'INSERT INTO ' . $tableName . " VALUES(\n\t";

        $data = [];

        foreach ( $entityColumns as $entityColumnName => $entityColumnValue ) {
            $data[ $entityColumnName ] = $attributes[$entityColumnName] ?? $entityColumnValue->getDefault();
            $query .= ":$entityColumnName,\n\t";
        }

        $query = substr($query, 0, -3);
        $query .= "\n)";

        $statement = $this->prepare( $query );

        $success = false;
        foreach ($data as $dataName => $dataValue) {
            $success = $statement->bindValue( $dataName, $dataValue );
            if ( !$success ) break;
        }

        if ( $success && $statement->execute() ) {
            $lastInsertRowID = $this->lastInsertRowID();
            return $this->findById( $entityClassName, $lastInsertRowID );
        }

        return false;
    }

    public function all( string $entityClassName, $mode = SQLITE3_ASSOC ) : array | false {
        $tableName = $this->getTaleName( $entityClassName );
        $query = 'SELECT * FROM ' . $tableName;
        $results = $this->query( $query );
        if (!$results) return false;

        // Create array to keep all results
        $data = [];

        // Fetch Associated Array (1 for SQLITE3_ASSOC)
        while ( $result = $results->fetchArray(SQLITE3_ASSOC ) ) {
            // insert row into array
            array_push( $data, $result );
        }

        return $data;
    }

    public function findById( string $entityClassName, int $id ) : array | false {
        $tableName = $this->getTaleName( $entityClassName );
        $statement = $this->prepare('SELECT * FROM ' . $tableName . ' WHERE id = :id');
        $statement->bindValue( 'id', $id );
        $result = $statement->execute();
        if ( $result )
            return $result->fetchArray( SQLITE3_ASSOC );
        return false;
    }

    private function getTaleName( string $entityClassName ) : string {
        $r = preg_replace('~\\\\[^\\\\]*$~', '', $entityClassName);
        $str = str_replace($r.'\\', '', $entityClassName);
        $str = str_replace('Entity', '', $str);
        return strtolower( $str . 's' );
    }
}
