<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Validator</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
</head>
<body>
<!-- Order Approval Form -->
<div class="form-container">
    <h2>Approve Order</h2>
    <form action="{{route('validator.approve')}}" method="POST">
        @csrf
        <div class="input-group">
            <label for="orderNumber">Order Number</label>
            <input type="radio" id="orderNumber" name="orderNumber" placeholder="Enter order number">
            <div id="orderNumberError" class="error"></div>
        </div>

        <button type="submit" class="btn">Approve Order</button>
    </form>
</div>

<!-- Order Status Results -->
<div class="validation-results" id="orderResults" style="display:none;">
    <h3>Order Approval Status</h3>
    <p id="orderApprovalMessage" style="font-size: 16px; color: green;"></p>
</div>

<script>
    function approveOrder() {
        // Clear previous errors and status
        document.getElementById("orderNumberError").innerHTML = '';
        document.getElementById("orderResults").style.display = 'none';
        document.getElementById("orderApprovalMessage").innerText = '';

        let valid = true;

        // Validate Order Number
        const orderNumber = document.getElementById("orderNumber").value;
        if (orderNumber === '') {
            document.getElementById("orderNumberError").innerHTML = 'Order number is required';
            valid = false;
        }

        // Show approval message if valid
        if (valid) {
            document.getElementById("orderResults").style.display = 'block';
            document.getElementById("orderApprovalMessage").innerText = 
                `Order #${orderNumber} has been successfully approved.`;
        }

        return false; // Prevent form submission for this demo
    }
</script>

</body>
</html>
