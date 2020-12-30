jQuery(function ($) {
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        //console.log(url);
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanently deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
                swal({
                    title: 'Permanently Deleted',
                    text: 'This record was permanently deleted!',
                    icon: 'success',
                    buttons: "Close",
                })
            } else {
                swal({
                    title: 'The deletion process has been canceled',
                    text: 'This record was NOT deleted!',
                    icon: 'info',
                    buttons: "Close",

                })
            }
        });
    });
});
