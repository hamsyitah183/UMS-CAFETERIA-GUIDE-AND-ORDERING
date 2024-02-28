function confirmation(ev) {
    ev.preventDefault();

    var urlToRedirect=ev.currentTarget.getAttribute('href');

    console.Log(urlToRedirect)

    swal({

        title: "Are you sure to delete this ?",
        text: "You will not be able to revert this delete",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })

    .then((willCancel)=> {

        if(willCancel){
            window.location.href=urlToRedirect;
        }
    }
    );

}