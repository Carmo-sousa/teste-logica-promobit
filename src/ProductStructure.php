<?php
namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
        // Regex que separa a cor e o tamanho do produto
        $pattern = "/(^[a-z]*).([A-Z]*)/";
        $products = [];

        foreach (self::products as $product) {
            preg_match($pattern, $product, $matches);

            $color = $matches[1];
            $size = $matches[2];
            
            if (!isset($products[$color][$size])) {
                $products[$color][$size] = 0;
            }

            $products[$color][$size] += 1;
        }

        return $products;
    }
}
