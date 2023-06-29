<?php
namespace App\Helper;

// session_start();
class Cart
{
    /**
     *
     *  là mảng gồm các sản phẩm trong giỏ hàng
     */
    public $items = [];

    /**
     *
     */
    public $totalPrice = 0; /**
         *
         */
    public $totalQuantity = 0;
    public function __construct()
    {
        /**

         */
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->getTotalPrice();
        $this->totalQuantity = $this->getTotalQuantity();
    }
    /**
     * phương thức add xử lý thêm mới sản phẩm và giỏ hàng
     * @var $product là tham số dữ liệu sản phẩm đầu vào
     * @var $quantity là tham số số lượng thêm mới, mặc định là 1
     */
    public function add($product, $quantity = 1, $img, $mausac1, $kichco1)
    {
        $id = $product->Ma_SP;
        // dd($id);
        /** Kiểm tra nếu đã có sản phẩm trong giỏ hàng rồi */
        if (isset($this->items[$id])) {
            $this->items[$id]->quantity += $quantity; // tăng số lượng lên
        } else {
            // nếu chwua thì tiến hành lưu vào sesion
            // dd($product);
            $item = [
                'id' => $product->Ma_SP,
                'name' => $product->Ten_sp,
                'image' => $img->Ten_file_anh,
                'price' => $product->Gia_moi,
                'quantity' => $quantity,
                'mausac' => $mausac1,
                'kichco' => $kichco1,
            ];
            // thêm sản phẩm vào mảng $items, chuyển về dạng object
            $this->items[$id] = (object) $item;
            // dd($item);
            // dd($this->items[$id]);
        }
        // dd($item[$id]->Gia_moi);
        /** Lưu lại session giỏ hàng */
        session(['cart' => $this->items]);

        // dd(session(['cart' => $this->items]));
        // dd($item);

    }
    /**
     * Phương thức xóa sản phẩm khỏi giỏ hàng
     * @var @id là tham số id cảu sản phẩm
     */
    public function delete($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]); // Loại bỏ sản phẩm khỏi mảng
            /** Lưu lại session giỏ hàng */
            session(['cart' => $this->items]);
        }
    }
    /**
     * Phương thức update cập nhật số lượng sản phẩm khỏi giỏ hàng
     * @var @id là tham số id cảu sản phẩm* @var $quantity số lượng cần cập nhật
     */
    public function update($id, $quantity)
    {
        /** Kiểm tra nếu đã có sản phẩm trong giỏ hàng rồi */
        if (isset($this->items[$id])) {
            $this->items[$id]->quantity = $quantity; // tăng số lượng lên
        }
    }
    public function clear()
    {
        session(['cart' => null]);
    }
    /**
     * Phương thức tính toán trả về tổng tiền trong giỏ hàng
     */
    private function getTotalPrice()
    {
        $total = 0;
        foreach ($this->items as $item) {
            // dd($item->price);
            $total += $item->quantity * $item->price;
        }
        return $total;
    }
    /**
     * Phương thức tính toán trả về tổng số lượng trong giỏ hàng
     */
    private function getTotalQuantity()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity;
        }
        return $total;
    }
}