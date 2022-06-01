# MediaEmbed

## API Overview

### Parsing
You can either use `parseUrl()` (default lookup) or `parseId()` (reverse lookup) of `MediaEmbed`.
The latter is useful if you only store the "host slug" and "id" in the database instead of the
complete URL.
Both methods will return an `MediaObject` object, which will contain the parsed input.

### Output
You can then display the HTML code with `getEmbedCode()` or retrieve more information using the getters of `MediaObject`.


## Usage
The simplest usage, when included via composer autoload, would be:
```php
// At the top of the file
use MediaEmbed\MediaEmbed;

// Somewhere in your (class) code
$MediaEmbed = new MediaEmbed();
```

### Auto-transforming user posted URLs in inline content

Usually, users don't care or don't know how exactly a video is linked/embedded.
So if they just paste the URL of the browser, you can directly replace those URLs with the HTML code of it:
```php
// Process all links in some content
public function autoLink($text) {
    return preg_replace_callback(..., [&$this, '_linkUrls'], $text);
}

protected function _linkUrls($matches) {
    if (!isset($this->MediaEmbed)) {
        $this->MediaEmbed = new MediaEmbed();
    }
    $MediaObject = $this->MediaEmbed->parseUrl($url);
    if ($MediaObject) {
        return $MediaObject->getEmbedCode();
    }
    // No media match found - normal <a href="...">...</a> replacing here
}
```

As this is costly when used at runtime, it is usually better to parse the URL upon save
and transform it into a BBCode like syntax that can be translated into HTML quicker and easier.

### Example with "host slug" and "id" saved in DB
When a URL is posted in the video field (varchar 255), we can extract the data from it and validate it:
```php
$id = $host = null;
$MediaObject = $this->MediaEmbed->parseUrl($url);
if ($MediaObject) {
    $id = $MediaObject->id();
    $host = $MediaObject->slug();
}
```
Those two values can be stored persistently (the complete URL including schema might change).

A helper method can then display it:
```php
public function video($host, $id, array $options = []) {
    if (!isset($this->MediaEmbed)) {
        $this->MediaEmbed = new MediaEmbed($options);
    }
    $MediaObject = $this->MediaEmbed->parseId($id, $host);
    if (!$MediaObject) {
        return '';
    }
    if (!empty($options['attributes'])) {
        foreach ($options['attributes'] as $attribute => $value) {
            $MediaObject->setAttribute($attribute, $value);
        }
    }
    return $MediaObject->getEmbedCode();
}
```

### Customizing attributes and params in the embed code
This example shows you how to add custom attributes to the iframe tag or parameters to the src url (so you can add the autoplay parameter on youtube for example):
```php
$MediaObject = $this->MediaEmbed->parseUrl('https://www.youtube.com/watch?v=111111');
if ($MediaObject) {
    $MediaObject->setParam([
        'autoplay' => 1,
        'loop' => 1
    ]);
    $MediaObject->setAttribute([
        'type' => null,
        'class' => 'iframe-class',
        'data-html5-parameter' => true
    ]);

    return $MediaObject->getEmbedCode();
}
```
This should return and embed code like:
```html
<embed src="https://www.youtube.com/embed/111111?autoplay=1&amp;loop=1" class="iframe-class" data-html5-parameter></iframe>
```

### Example with BBCode

#### Parse video content upon save (db input)
```php
/**
 * @param string $string
 * @return string
 */
protected function _parseVideo($string) {
    return preg_replace_callback('/\[video=?(.*?)\](.*?)\[\/video\]/is', [$this, '_processVideo'], $string);
}

/**
 * @param array $params
 * @return string
 */
protected function _processVideo($params) {
    if (!isset($this->MediaEmbed)) {
        $this->MediaEmbed = new MediaEmbed();
    }
    $url = $params[2];
    if (strpos($url, 'www.') === 0) {
        $url = 'http://' . $url;
    }
    $MediaObject = $this->MediaEmbed->parseUrl($url);
    if (!$MediaObject) {
        return $params[0];
    }
    $slug = $MediaObject->slug();
    if (!$slug) {
        $slug = $params[1];
    }
    if ($slug) {
        $slug = '=' . $slug;
    }
    $id = $MediaObject->id();
    $result = '[video' . $slug . ']' . $id . '[/video]';
    return $result;
}
```

So `[video]https://www.youtube.com/v/123[/video]` becomes `[video=youtube]123[/video]`.

#### Display the resulting code snippet upon display
```php
/**
 * @param string $string
 * @return string
 */
public function prepareForOutput($string) {
    return preg_replace_callback('/\[video=?(.*?)\](.*?)\[\/video\]/is', [$this, '_finalizeVideo'], $string);
}

/**
 * @param array $params
 * @return string
 */
protected function _finalizeVideo($params) {
    if (!isset($this->MediaEmbed)) {
        $this->MediaEmbed = new MediaEmbed();
    }
    $host = $params[1];
    $id = $params[2];
    $MediaObject = $this->MediaEmbed->parseId($id, $host);
    if (!$MediaObject) {
        return $params[0];
    }

    return $MediaObject->getEmbedCode();
}
```

So `[video]123[/video]` becomes `<iframe ...>...</iframe>` or `<object ...><embed src="..."</embed></object>`.

### More examples
You can see live examples when you get this repo running locally and browse to `examples` dir.
`index.php` has a list of examples, you can live-preview. `bbcode.php` shows how to use it in save/read callbacks.


## Contribute / TODOs
See [wiki](https://github.com/dereuromark/media-embed/wiki).

Looking forward for contributions, e.g. adding more yet missing services etc.
Please provide a simple test URL and test case for any new service.

Run tests with
```
composer test
```

Run coverage
```
composer test-coverage
```
and browse to the generated `tmp/index.php` via browser.

Run PHPStan
```
composer stan-setup
composer stan
```

Run CS check/fix with
```
composer cs-check
composer cs-fix
```

Update list of services in `docs/supported.md` with
```
bin/generate-docs
```
