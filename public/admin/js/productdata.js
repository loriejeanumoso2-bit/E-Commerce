<script>
function fetchProducts() {
    fetch('/admin/products-data')
        .then(response => response.json())
        .then(data => {
            let table = '';

            data.forEach(product => {
                table += `
                    <tr>
                        <td>${product.product_title}</td>
                        <td>${product.product_description.substring(0,50)}...</td>
                        <td>${product.product_quantity}</td>
                        <td>${product.product_prices}</td>
                        <td>${product.product_image}</td>
                        <td>${product.product_category}</td>
                        <td>${product.quantity}</td>
                        <td>
                            <a href="/delete_product/${product.id}">Delete</a>
                            <a href="/update_product/${product.id}">Update</a>
                        </td>
                    </tr>
                `;
            });

            document.getElementById('productTable').innerHTML = table;
        })

    }
// auto refresh every 3 seconds
setInterval(fetchProducts, 3000);
</script>