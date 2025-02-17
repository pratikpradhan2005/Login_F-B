<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notification</title>
  <style>
    .modal{
      display: block;
      position: fixed;
      z-index: 1000; 
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }
    .modal-content{
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      text-align: center;
    }
    .modal-content button{
      padding: 10px 20px;
      background: #3498db;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="modal">
    <div class="modal-content">
      <p>{{ $message }}</p>
      <button id="okButton">Ok</button>
    </div>
  </div>
  <script>
    document.getElementById('okButton').addEventListener('click', function(){
      window.location.href = "{{ $target }}";
    });
  </script>
</body>
</html>