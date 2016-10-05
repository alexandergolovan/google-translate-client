Google Translate Client
====================

## Usage

Instantiate GoogleTranslateClient object

```php
$translateClient = new GoogleTranslateClient(YOUR_API_KEY, SOURCE_LANGUAGE, TARGET_LANGUAGE);
```

Or set languages later
```php
$translateClient = new GoogleTranslateClient(YOUR_API_KEY); // Default is from 'ru' to 'en'

$translateClient->setSourceLanguage('ru'); // Translate from Russian
$translateClient->setTargetLanguage('en'); // Translate to English
```

Using GoogleTranslateClient language constants
```php
$translateClient->setSourceLanguage(GoogleTranslateClient::LANGUAGE_RUSSIAN);
$translateClient->setTargetLanguage(GoogleTranslateClient::LANGUAGE_ENGLISH);
```

Translate
```php
$translateClient->translate(['морковь', 'заяц', 'огород', 'Заяц ел морковь на огороде.']);

/*
    return
   
            Array
            (
                [0] => Array
                    (
                        [translatedText] => carrot
                    )
            
                [1] => Array
                    (
                        [translatedText] => hare
                    )
            
                [2] => Array
                    (
                        [translatedText] => garden
                    )
            
                [3] => Array
                    (
                        [translatedText] => Rabbit eating carrot in the garden.
                    )
            )
*/

```
Also, you can also use method chaining
```php
$translateClient->setSourceLanguage('ru')->setTargetLanguage('en')->translate(['Какое чудо']);
```

#### Available languages

Supported languages are listed in [Google API docs](https://cloud.google.com/translate/v2/using_rest#language-params).


# google-translate-client
