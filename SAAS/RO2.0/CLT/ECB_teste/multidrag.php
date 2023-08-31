
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>

<style id="jsbin-css">
.tinted {
	background-color: #fff6b2 !important;
}

.selected {
  background-color: #f9c7c8 !important;
  border: solid blue 1px !important;
  z-index: 1 !important;
}


</style>
</head>
<body>
  <!-- Latest compiled and minified CSS -->

  <!-- Latest Sortable -->
  <script src="js/Sortable.js"></script>

  
  <div id="list1" class="list-group">
    <div id="1" data-value='1' class="list-group-item">Item 1</div>
    <div  id="2" data-value='2'  name="2" class="list-group-item">Item 2</div>
    <div  id="3" data-value='3'  name="3" class="list-group-item">Item 3</div>
    <div  id="4" data-value='4'  name="4" class="list-group-item">Item 4</div>
    <div  id="5" data-value='5'  name="5" class="list-group-item">Item 5</div>
  </div>
  

    
  <div id="list2" class="list-group">
    <div id="1" class="list-group-item">xx 1</div>
    <div  id="2" class="list-group-item">xx 2</div>
    <div  id="3" class="list-group-item">xx 3</div>
    <div  id="4" class="list-group-item">xx 4</div>
    <div  id="5" class="list-group-item">xx 5</div>
  </div>
  
<script>
Sortable.create(list1, {
 
  multiDrag: true,
  selectedClass: "selected",
  animation: 150
});

Sortable.create(list2, {

  multiDrag: true,
  selectedClass: "selected",
  animation: 150
});

</script>

</body>
</html>