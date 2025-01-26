<script type="text/javascript">
    function confirmation(event) {
        event.preventDefault(); 
        var urlToRedirect = event.currentTarget.getAttribute('href');

        console.log(urlToRedirect); // 
        swal({
            title: "Are You Sure To Delete This?",
            text: "This will delete the product permanently.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // If confirmed, redirect to the URL
                window.location.href = urlToRedirect;
            }
        });
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
