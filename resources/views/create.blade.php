
<html>

<head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

    <div class="container">
        <h2>Create Sales Entry</h2>
        <form action="{{ route('sales_entries.store') }}" method="POST">
            @csrf
            <div id="entries-container">
                <div class="entry">
                    <div class="form-group">
                        <label for="item_id">Item:</label>
                        <select name="item_id[]" class="form-control" onchange="fetchPrice(this)" required>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price[]" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="text" name="quantity[]" class="form-control" oninput="calculateTotal(this)">
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Total Amount:</label>
                        <input type="text" name="total_amount[]" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success" onclick="addEntry()">Add Entry</button>
            <button type="submit" class="btn btn-primary">Save Sales Entries</button>
        </form>
    </div>

    <script>
        function fetchPrice(select) {
            var container = $(select).closest('.entry');
            var itemId = select.value;
            // Fetch price using AJAX
            $.get(`/calculate-total?item_id=${itemId}`, function(response) {
                container.find('[name^="price"]').val(response.price);
                calculateTotal(container);
            });
        }

        function calculateTotal(container) {
            var price = parseFloat(container.find('[name^="price"]').val());
            var quantity = parseInt(container.find('[name^="quantity"]').val());
            var totalAmount = isNaN(price) || isNaN(quantity) ? 0 : price * quantity;
            container.find('[name^="total_amount"]').val(totalAmount.toFixed(2));
        }

        function addEntry() {
            var entryHtml = $('#entries-container .entry:first').html();
            $('#entries-container').append('<div class="entry">' + entryHtml + '</div>');
        }
    </script>


    </html>
