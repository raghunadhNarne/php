<?php
    class MyClass
    {
        public $public = 'Public';
        protected $protected = 'Protected';
        private $private = 'Private';

        const const = 5;

        function printHello()
        {
            echo $this->public;
            echo $this->protected;
            echo $this->private;
        }
    }

    $obj = new MyClass();
    // echo $obj->public; // Works
    // echo $obj->protected; // Fatal Error
    // echo $obj->private; // Fatal Error
    echo 'MyClass'::const;
    $obj->printHello();


    
    class MyClass2 extends MyClass
    {
        // public $public = 'Public2';
        // protected $protected = 'Protected2';

        function printHello()
        {
            echo $this->public;
            echo $this->protected;
            var_dump($this->private);
        }
    }

    $obj2 = new MyClass2();
    var_dump($obj2->public); // Undefined
    $obj2->printHello();





    class Bar 
    {
        public function test() {
            $this->testPrivate();
            $this->testPublic();
        }

        public function testPublic() {
            echo "Bar::testPublic\n";
        }
        
        private function testPrivate() {
            echo "Bar::testPrivate\n";
        }
    }

    class Foo extends Bar 
    {
        public function testPublic() {
            echo "Foo::testPublic\n";
        }
        
        private function testPrivate() {
            echo "Foo::testPrivate\n";
        }
    }

    $myFoo = new Foo();
    $myFoo->test();

?>