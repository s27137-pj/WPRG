<?php


class Product
{
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

 
    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function __toString()
    {
        return "Product: {$this->name}, Price: {$this->price}, Quantity: {$this->quantity}";
    }
}

class Cart
{
    private $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product)
    {
        foreach ($this->products as $key => $p) {
            if ($p->getName() === $product->getName()) {
                unset($this->products[$key]);
                $this->products = array_values($this->products); // reindex array
                return;
            }
        }
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice() * $product->getQuantity();
        }
        return $total;
    }

    public function __toString()
    {
        $output = "Products in cart:\n";
        foreach ($this->products as $product) {
            $output .= $product . "\n";
        }
        $output .= "Total price: " . $this->getTotal();
        return $output;
    }
}

// Przykład użycia
$product1 = new Product("Laptop", 1500, 1);
$product2 = new Product("Mouse", 50, 2);

$cart = new Cart();
$cart->addProduct($product1);
$cart->addProduct($product2);

echo $cart;

$cart->removeProduct($product2);

echo "\n\nAfter removing Mouse:\n";
echo $cart;


?>

