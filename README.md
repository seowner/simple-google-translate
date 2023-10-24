# Simple Google Translate

A simple PHP class for Google translate API. This class is designed to be used to pre-selected languages (not auto language detection).

# How to Use

Create an API key on [Google Cloud](https://cloud.google.com/) Translate.

Put google-translate.class.php in a folder of your choosing and require the class in your PHP file.

```
require_once '/path/to/google.translate.class.php';
```

Assign source language and target language variables. [SerpAPI](https://serpapi.com/google-languages) has a good list of all the language codes in you need them.

```
$sourceLanguage = 'en';
$targetLanguage = 'de';
```

Execute the translation.

```
$output = $client->translate($string, $sourceLanguage, $targetLanguage);
```

# Example

```
require_once '/path/to/google.translate.class.php';

$sourceLanguage = 'en';
$targetLanguage = 'de';

$string = "Hello this is a test.";
$output = $client->translate($string, $sourceLanguage, $targetLanguage);
echo $output;

Output:
Hallo, das ist ein Test.
```

# Links

Follow me on Twitter/X at [@tehseowner](https://twitter.com/tehseowner)

Check out my other plugins on [OCScripts.com](https://www.ocscripts.com/)
