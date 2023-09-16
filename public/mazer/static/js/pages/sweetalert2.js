document.getElementById("logout-button").addEventListener("click", (e) => {
  Swal.fire({
      icon: "question",
      titleText: "Are you leaving?",
      text: "Are you sure want to logout?",
      showCancelButton: true,
      confirmButtonText: 'Logout',
      focusCancel: true,
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById('logout-form').submit()
      }
  })
});

  