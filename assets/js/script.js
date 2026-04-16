  AOS.init();




// var xValues = ["Schhol Director", "Guardian", "Student", "Super Admin"];
// var yValues = [114, 875, 547, 2];
// var barColors = [
//   "#b91d47",
//   "#00aba9",
//   "#2b5797",
//   "#e8c3b9"
  
// ];

// new Chart("myChart", {
//   type: "pie",
//   data: {
//     labels: xValues,
//     datasets: [{
//       backgroundColor: barColors,
//       data: yValues
//     }]
//   },
//   options: {
//     title: {
//       display: true,
//       text: "World Wide Wine Production 2018"
//     }
//   }
// });

$('.btn-default').on('click',function(){
  $('.default-menu').slideToggle()
  $('.dropdown-overlay').show()
});
$('.dropdown-overlay').on('click',function(){
  $('.default-menu').hide(); 
  $(this).hide();
});

$('.btn-danger').on('click',function(){
  $('.slide-menu').slideToggle();
  $('.dropdown-overlay').show();
})
$('.dropdown-overlay').on('click',function(){
  $('.slide-menu').hide();
  $(this).hide();
})