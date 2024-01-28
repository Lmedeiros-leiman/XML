A php class to help handle XML files.
it recieves a XML string or a JSON string and turns it into a xml file.

you may modify the file as either JSON or XML in any way you want and this class does not help with that.
this class only helps with Fetching,Translating and saving data.

to use this class you need to provide either a path to a XML/JSON file OR the raw data string.

Example:
```php
<?php
$XMLString = "<?xml version="1.0" encoding="UTF-8"?>
  <Test TestId="0001" TestType="CMD">
    <Name>Convert number to string</Name>
    <CommandLine>Examp1.EXE</CommandLine>
    <Input>1</Input>
    <Output>One</Output>
  </Test";

$XMLdata = new XML($XMLString);

# you are set, you can change the string into a file path.
# you can also use a JSON object or raw string.

```
