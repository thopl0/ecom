import "./bootstrap";
import { defineImageUpload } from "image-upload-wc";

defineImageUpload();

export function addToCart(id, quantity) {
    console.log(id, quantity);
    // axios
    //     .post("/add-to-cart", {
    //         productId: id,
    //         quantity: quantity,
    //     })
    //     .then((response) => {
    //         console.log(response.data);
    //     });
}
