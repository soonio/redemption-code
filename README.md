# Redemption Code Generate & Verify

## use

```shell
composer require soonio/redemption-code
```

## define chars

```php
const CHARS = [
    'H', 'I', 'J', 'K', 'L', '8', '9',
    '3', '4', '5', 'O', 'P', 'Q', 'G',
    'V', 'W', '1', '2', 'X', 'Y', 'Z',
    'A', 'B', 'C', 'D', 'S', 'T', 'U',
    '6', '7', 'M', 'N', 'R', 'E', 'F',
];

```

## generate

```php
$rc = new soonio\rc\RedemptionCode(CHARS, 20);

echo "redemption code: {$rc->generate()}\n";
```


## verify

```php
$bool = (new soonio\rc\RedemptionCode(CHARS, 20))->verify('I7AXXDN2TZXPQT788GV3');
echo $bool ? "验证通过\n" : "验证拒绝";
```

## Differentiation

Only need to disrupt the order of the array of characters "CHARS" can be different in other people's projects.


## Develop

### run demo

```shell
 php examples/index.php
```

### test
```shell
composer test
```
