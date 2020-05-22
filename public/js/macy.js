const macy = Macy({
  container: '.gallery',
  trueOrder: false,
  waitForImages: false,
  margin: 10,
  columns: 4,
  breakAt: {

      940: 3,
      520: 2,
      400: 1
  }
});


window.onload = function() {
  if(!location.hash) {
      history.replaceState(null, '', '#hoge');
      location.reload();
  }
}
