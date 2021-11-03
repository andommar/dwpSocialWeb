// $( ".category" ).hover(function() {
//     $( ".category" ).removeClass( "btn-outline-purple" ).addClass( "btn-purple" );
//   });

// tendré que establecer un id en cada botón que sea único, para enviarlo al back y para cambiarle el diseño aquí, sino marcaré más de uno 
$( ".btn-primary-deselected" ).click(function() {
    $( ".btn-primary-deselected" ).removeClass( "btn-primary-deselected" ).addClass( "btn-primary-selected" );
});
$( ".btn-primary-selected" ).click(function() {
    $( ".btn-primary-selected" ).removeClass( "btn-primary-selected" ).addClass( "btn-primary-deselected" );
});

// $( ".btn-outline-success" ).click(function() {
   
// });
// $( ".btn-outline-danger" ).click(function() {
   
// });
// $( ".btn-outline-warning" ).click(function() {
   
// });
// $( ".btn-outline-info" ).click(function() {
    
// });
// $( ".btn-outline-secondary" ).click(function() {
   
// });

