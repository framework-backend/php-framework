Norme de codage
###############

Pour que chaque morceau de code soit familier, le **Framework** définit des normes de codage que toutes les contributions doivent suivre.

Ces normes de codage du **Framework** sont basées sur les normes:

    - `PSR-1 (Norme de codage de base) <https://www.php-fig.org/psr/psr-1>`_
    - `PSR-4 (Autoloader) <https://www.php-fig.org/psr/psr-4>`_
    - `PSR-12 (Style de codage étendu) <https://www.php-fig.org/psr/psr-12>`_

Voici un court exemple contenant la plupart des fonctionnalités décrites dans les **PSRs** :

.. code-block:: php

    <?php
    namespace MyNamespace;

    /**
     * Coding standards demonstration.
     */
    class StudlyCaps
    {
        const SOME_CONST = 42;

        /**
         * @var string
         */
        private $fooBar;

        /**
         * @param string $foobar description parameter
         */
        public function __construct( $foobar )
        {
            $this->fooBar = $foobar;
        }

        public function getFooBar() : string {
            return $this->foobar;
        }
    }
