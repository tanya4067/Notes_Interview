<?php

//OOPS on PHP
//extends - It is used to extend the properties of parent class to the subclass 
//final - It is used to prohibit the property of extending class properties from one to another 
//this - It is used to call the current value of the variable
//const - A class constant is declared inside a class with const keyword. It cannot be changed once it is declared
//It can be accessed outside the class using the operator [::]
// Abstract- class -> Abstract classes and methods are when the parent class has a named method but need its child classes to fill out the tasks.
// It is a class that contains at least one abstract method (An abtract method is ma method that is declared but not implemented in the code).
//Used by the keyword -abstract
// To implement an interface , a class must us the implements keyword.
// A class

/*
 INTERFACES
--Interfaces allow to specify what methods a class should implement.
--It make it easy to use a variety of different class in the same way.
--When one or more classess use the same interface, it is refferered to as a polymorphism
*/
/*
 --Interfaces cannot have properties but abstract class can have.
 --All interface methods must be public, while abstract class methods is public or protected.
 --All methods in an interface are abstract,so they cannot be implemented in code and the abstract keyword is not necessary.
 --Classes can implement an interface while inheriting from another class at the same time.
 --Interface is not a class
 */

class Fruit{
    public $name;
    public $color;
    public $weight;

    const GOODBYE_MESSAGE="Thank you for visiting the page. Hope to meet soon!";

    function __construct($name,$color,$weight)
    {
        $this->name=$name;
        $this->color=$color;
        //$this->weight=$weight;
    }
    
    /*function set_name($name)
    {
        $this->name=$name;
    }*/
    function get_name()
    {
        return($this->name);
    }
    /*function set_color($color)
    {
        $this->color=$color;
    }*/
    function get_color()
    {
        return($this->color);
    }
    /*function set_weight($weight)
    {
        $this->weight=$weight;
    }*/
    function get_weight()
    {
        return($this->weight);
    }
    protected function intro()
    {
        echo "The fruit is {$this->name} , {$this->color} and {$this->weight}.";
    }

}
class Strawwberry extends Fruit{
    public function __construct($name,$color,$weight)
    {
        $this->name=$name;
        $this->color=$color;
        $this->weight=$weight;
    }
    public function intro1()
    {
        echo "The fruit name is {$this->name},{$this->color} and {$this->weight}";
    }

    public function message()
    {
        echo "Am I a fruit or a berry?";
        $this->intro1();//This can be accessed from within the class
    }
    public function __destruct()
    {
        echo "Destructuring the values of {$this->name}"."\n";
        echo Fruit::GOODBYE_MESSAGE;
    }
}
class Vehicles
{
    public $car;
    public $bus;
    public $bike;

    function __construct($car,$bus,$bike)
    {
        $this->car=$car;
        $this->bike=$bike;
        $this->bus=$bus;
    }
    function __destruct()// it is implemented at the end of the function ehen the function is ended it is used to retrieve the data back
    {
        echo "The vehicles are {$this->car},{$this->bus} and {$this->bike}";
    }
    function get_car()
    {
       return($this->car);
    }
    function get_bus()
    {
        return($this->bus);
    }  
    function get_bike()
    {
        return($this->bike);
    }
}
$strawberry=new Strawwberry("Strawberrry","Red","100 gm");
$strawberry->message();
//$strawberry->intro();
echo "<br>";
echo Fruit::GOODBYE_MESSAGE; // This is used to access constant variable inside a class
echo "<br>";




$vehicles=new Vehicles("BMW","volvo","hayabusa");
echo ($vehicles->get_car());
echo "<br>";
echo ($vehicles->get_bus());
echo "<br>";
echo($vehicles->get_bike());
echo "<br>";


$apple=new Fruit("Apple","Red","45 gm");
$banana=new Fruit("Banana","Yellow","60 gm");

var_dump($apple instanceof Fruit);


//$apple->set_name("Apple"); // $apple->name="Apple";(alternate way to assignt he name of the fruit)
//$banana->set_name("Banana");

echo "<br>";
echo $apple->get_name();
echo "<br>";
echo $banana->get_name();

//$apple->set_color("Red");
//$banana->set_color("yellow");

echo "<br>";
echo $apple->get_color();
echo "<br>";
echo $banana->get_color();

//$apple->set_weight("500 gm");
//$banana->set_weight("200 gm");

echo "<br>";
echo $apple->get_weight();
echo "<br>";
echo $banana->get_weight();
echo "<br>";
//Here destruct will be performed at the end of the program
/*
 There are three types of access modifiers
 1. public - it can be access from anywhere 
 2. protected - it can be accessed from within the class and class derived from that class 
 3. private - the property that can only be accessed within the class
 */

/***********************ABSTRACT CLASS******************************/
//class is defined with some functions but not complete work is defined in it 
/*abstract class ParentClass{
    abstract public function someMethod1();
    abstract public function someMethod2();
    abstract public function someMethod3();

}*/
//When inheriting from abstract class , child class must be defines from the same name/ same modifier (less restricted access modifier)
//eg If a abstract method is defined as protected, the child class method must be defined either as protected or public, but nor private
//Also the type and number of required arguments must also be the same

abstract class Car{
    public $name;
    public function __construct($name)
    {
        $this->name=$name;
    }
    abstract public function intro();

}
class Audi extends Car{
    public function intro()
    {
        return("Hi I am {$this->name} born in Germany and I am world class car used by everyone!");
    }
}

class Volvo extends Car{
    public function intro()
    {//they are using the name property from the abstract class
        return("Hi I am {$this->name} born in Swedish and I am world class car used by everyone!");
    }
}

class Citroen extends Car{
    public function intro()
    {
        return("Hi I am {$this->name} born in France and I am world class car used by everyone!");
    }
}

$audi=new Audi("Audi");
$volvo=new Volvo("Volvo");
$citroen=new Citroen("Citroen");

echo ($audi->intro());
echo "<br>";
echo ($volvo->intro());
echo "<br>";
echo ($citroen->intro());
echo "<br><br>";

/******************ABSTRACT CLASS EXAMPLE 2****************************/
abstract class ParentClass{
    abstract protected function prefixName($name);
}
class ChildClass extends ParentClass{
    public function prefixName($name,$separator=".",$greet="Dear")
    {
        if($name=="John Doe")
        {
            $prefix="Mr.";
        }
        elseif($name=="Jane Doe")
        {
            $prefix="Mrs.";
        }
        else{
            $prefix="";
        }
        return("{$greet} {$prefix} {$separator} {$name}");
    }
    public function suffixName($name)
    {
        return("{name}");
    }
}
$class =new ChildClass;
echo($class->prefixName("John Doe","    ","Dear the saviour of the earth"));
echo "<br>";
echo ($class->suffixName("Jane Doe"));
echo "<br>";


/*************************PHP OOPS INTERFACES************************************/
/* SYNTAX
 interface InterfaceName{
    public function someMethod1();
    public function someMethod2($name,$color);
    public function someMethod3();
 }
*/
interface Animal{
    public function makeSound();
}
class Cat implements Animal{
    public function makeSound()
    {
        echo "Meow";
        echo "<br>";
    }
}

class Dog implements Animal{
    public function makeSound()
    {
        echo "Bark";
        echo "<br>";
    }
}

class Mouse implements Animal{
    public function makeSound()
    {
        echo "Squeak";
        echo "<br>";
    }
}
$cat=new Cat();
$dog=new Dog();
$mouse=new Mouse();

$animals=array($cat,$dog,$mouse);

foreach($animals as $animal)
{
    $animal->makeSound();
}
print('**********************############################***********************************');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CKEditor with Templates Example</title>
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> 
</head>
<body>
    <form method="POST" action="process.php">
        <textarea name="editor1" id="editor1"></textarea>
        <script>
            CKEDITOR.replace('editor1', {
                extraPlugins: 'templates',
                templates: 'myTemplates',
                templates_files: ['/path/to/my_templates.js'],
                templates_replaceContent: false, // Set to true to replace content with the template
                templates: [
                    {
                        title: 'Simple Template',
                        image: 'template1.gif',
                        description: 'A simple one-column layout.',
                        html: '<h2>Title</h2><p>Content goes here...</p>'
                    },
                    {
                        title: 'Two Columns',
                        image: 'template2.gif',
                        description: 'A layout with two columns.',
                        html: '<div style="width:50%; float:left;"><p>Left column content...</p></div><div style="width:50%; float:right;"><p>Right column content...</p></div><div style="clear:both;"></div>'
                    }
                ]
            });
        </script>
        <button type="submit">Submit</button>
    </form>

    
</body>
</html>





