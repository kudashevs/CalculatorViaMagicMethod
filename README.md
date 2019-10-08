## Calculator Via Magic Method

A simple calculator app is written in PHP and implements mathematical operations through magic _call method.

The main idea is that we use Calculator class which receives some method call with arguments (method actually doesn't exist).
Magic __call method works like FactoryMethod pattern and decides which operation to use. If the method name is a valid class name
related to some operation when __call method evaluates calculations on the specific class and returns the result. If not
Exception will be thrown.


This isn't a production solution, but only a training exercise which helps better understand how magic methods work.  
Any ideas, suggestions, and reviews will be much appreciated :)