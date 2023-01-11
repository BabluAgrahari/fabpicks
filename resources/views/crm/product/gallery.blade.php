<style>
img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev1,
.next1 {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: #e22b2b;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next1 {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev1:hover,
.next1:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
  .outer-remove{
        margin-top: -22px;
    text-align: right;
  }
  .inner-remove{
     background: #f8f9fb;
  }
</style>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>

    $(document).on('click', '#images', function(e) {
        e.preventDefault(0);
    $('#imageModal').modal('show');
        // let id = $(this).attr('_id');
        // $.ajax({
        //     url: '{{url("client-show")}}/' + id,
        //     method: 'GET',
        //     dataType: "JSON",
        //     success: function(res) {
        //         $('#first_img').html(res.img1);
        //         $('#second_img').html(res.img2);
        //         showSlides(1);
        //         $('#imageModal').modal('show');
        //         $('[data-toggle="tooltip"]').tooltip();
        //     }
        // })
    });

  
 </script> 
//         <script>
//            let slideIndex = 1;
//            showSlides(slideIndex);
//         function plusSlides(n) {
//           showSlides(slideIndex += n);
//         }

//         function currentSlide(n) {
//           showSlides(slideIndex = n);
//         }

//         function showSlides(n) {
//           let i;
//           let slides = document.getElementsByClassName("mySlides");
//           let dots = document.getElementsByClassName("demo");
//           let captionText = document.getElementById("caption");
//           if (n > slides.length) {slideIndex = 1}
//           if (n < 1) {slideIndex = slides.length}
//           for (i = 0; i < slides.length; i++) {
//             slides[i].style.display = "none";
//           }
//           for (i = 0; i < dots.length; i++) {
//             dots[i].className = dots[i].className.replace(" active", "");
//           }
//           slides[slideIndex-1].style.display = "block";
//           dots[slideIndex-1].className += " active";
//          // captionText.innerHTML = dots[slideIndex-1].alt;
//         }
          
//           $(document).on('click','.inner-remove',function(){
//             var id = $(this).attr('_id');
//             if(confirm("Are you sure! you want to Remove it.")){
//             $.ajax({
//               url:'{{url("remove-img")}}/'+id,
//               type:'GET',
//               dataType:'JSON',
//               success:function(res){
//                 if(res.status=='success'){
//                   $('#remove-'+id).fadeOut('slow');
//                 }else if(res.status=='error'){
//                   alert(res.status);
//                 }
//               }
//             })
//             }
//           });
//         </script>

