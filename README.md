# Simple Google Translate

A simple PHP class for Google translate API. This class is designed to be used to pre-selected languages (not auto language detection).

# How to Use

1. Create an API key on [Google Cloud](https://cloud.google.com/) Translate.
2. Put google-translate.class.php in a folder of your choosing and require the class in your PHP file.
3. Make sure to add your API key before executing the code.
4. Assign source language and target language variables. [SerpAPI](https://serpapi.com/google-languages) has a good list of all the language codes in you need them.
5. Execute the translation.

# Example

This example assumes that you use the default of $client and your API key is correct.

```
// Require the class
require_once '/path/to/google.translate.class.php';

// Add API key
$apiKey = 'YOUR_API_KEY';
$client = new SimpleGoogleTranslate($apiKey);

// Assign language variables
$sourceLanguage = 'en';
$targetLanguage = 'de';

// Add a string to translate
$string = "Hello this is a test.";

// Execute the code and get the result
$output = $client->translate($string, $sourceLanguage, $targetLanguage);
echo $output;

Output:
Hallo, das ist ein Test.
```

# Links

Follow me on Twitter/X at [@tehseowner](https://twitter.com/tehseowner)

Check out my other plugins on [OCScripts.com](https://www.ocscripts.com/)
