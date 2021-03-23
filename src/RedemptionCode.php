<?php

namespace soonio\rc;

/**
 * 兑换码生成及验证算法
 * Class RedemptionCode
 */
class RedemptionCode
{
    /**
     * @var array
     */
    protected array $chars = [];

    /**
     * @var int
     */
    protected int $length = 10;

    /**
     * RedemptionCode constructor.
     * @param array $chars 用于构造兑换码的字符
     * @param int $length 兑换码长度(为了安全性，最好不要低于10位)
     */
    public function __construct(array $chars, int $length=10)
    {
        $this->chars    = $chars;
        $this->length   = $length;
    }

    /**
     * 生成CODE
     * @return string
     */
    public function generate(): string
    {
        $letters    = $this->chars;
        $length     = $this->length;

        $chars      = [];
        do {
            shuffle($letters);
            $chars[] = $letters[0];
        } while(--$length > 1);
        array_push($chars, static::algorithm($chars));
        return join('', $chars);
    }

    /**
     * 验证CODE是否正确
     * @param string $code
     * @return bool
     */
    public function verify(string $code): bool
    {
        $codes = str_split($code);
        $mi = count($codes) - 1;
        return $this->algorithm(array_slice($codes, 0, $mi)) == $codes[$mi];
    }

    /**
     * 校验位算法
     * @param array $chars
     * @return string
     */
    protected function algorithm(array $chars): string
    {
        $items = [];
        foreach ($chars as $char) {
            $order = ord($char);
            $items[] = $order * ($order % 10);
        }
        $index = array_sum($items) % (count($this->chars) - 1);
        return $this->chars[$index];
    }
}
