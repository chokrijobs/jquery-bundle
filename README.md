# jquery-bundle
## Installation
add this line to your composer.json
```sh
 "schokri/jquery-bundle": "dev-dev"
```
### Configuration example
```yaml
jquery:
    connection: default
    jquery_autocomplete:
        autocomplete_1:
            entity: AppBundle\Entity\Article
        autocomplete_2:
            entity: AppBundle\Entity\Product
```
### Add PaginatorBundle to your application kernel

```php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Schokri\JqueryBundle\JqueryBundle(),
        // ...
    );
}
```
## Usage examples:
### View

```twig
<div class="css_class">{{ jquery_autocomplete('autocomplete_1') }}</div>
```