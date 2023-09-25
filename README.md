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