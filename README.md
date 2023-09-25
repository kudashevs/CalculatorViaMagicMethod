# Calculator Via Magic

This is a case study that aims to show one of the possible ways of using magic methods in PHP language.


## How it works

We are given a `Calculator` class with the only one `__call` method. This is so-called "magic method", which is
triggered when an inaccessible method is called on an object. This magic method accepts the name of a method being
called and an array of the provided arguments. When the `__call` method is triggered, a `Calculator` instance is trying
to identify an `Operation` that corresponds to a received method name. If the suitable `Operation` exists, the `Calculator`
requests a factory to create an instance of the operation and performs calculations using this instance. If not, it throws
an exception as if there were no such method.

```php
$calculator = new Calculator();
echo $calculator->addition(1, 2); // results in 3
```
for more usage examples, please see the [examples](examples/) folder.


## Notes

By default, the package provides four classes that correspond to the basic math operations (addition, subtraction,
multiplication, division). Each class extends an `Operation` class. The `Operation` class is an abstract class that
obligates its subclasses to implement the `performCalculation` method. It also provides default implementations for
`calculate` and `validate` methods. The `Division` class overrides the default implementation of the `validate` method
and extends its functionality. For more information see the [Operations](src/Operations/) folder).

A lookup table for supported operations is kept as a constant in the [Factory.php](src/Operations/Factory.php) file.


## Things to learn

[//]: # (@todo don't forget to update the line numbers)
Things that you can learn from this case study:
- magic methods, how they work, and [how you can use them](src/Calculator.php#L36)
- how to [use the factory pattern](src/Operations/Factory.php) (one of the possible implementations)
- how to [use final to force the subclasses to use predefined behavior](src/Operations/Operation.php#L23)
- how to [override and extend methods inherited from the base class](src/Operations/Division.php#L28)


## License

The MIT License (MIT). Please see the [License file](LICENSE.md) for more information.