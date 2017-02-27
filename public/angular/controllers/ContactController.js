app.controller('ContactController', function($scope, $http, API_URL){

  console.log(new Date());
  $http.get(API_URL + "contact").success(function(response){

    $scope.contacts = response;
    console.log("$scope.contacts", $scope.contacts);
    for (var i = 0; i < $scope.contacts.length; i++) {
      console.log(DaysToBDay($scope.contacts[i].birth_day))
      $scope.contacts[i].daysToBDay = DaysToBDay($scope.contacts[i].birth_day);
    }

  });

  // show modal form
  $scope.toggle = function(modalstate, id){
    $scope.modalstate = modalstate;
    switch (modalstate) {
      case 'add':
        $scope.form_title = "Add New Contact";
        break;
      case 'edit':
        $scope.form_title = "Contact Detail";
        $scope.id = id;
        $http.get(API_URL + 'contact/' + id).success(function(response){
          console.log(response);
          $scope.contact = response;
        });
        break;
      default:
      break;
    }
    console.log(id);
    $('#myModal').modal('show');
  }
// save and update record
  $scope.save = function(modalstate, id){
    var url = API_URL + "contact";
    if (modalstate === 'edit') {
      url += "/" + id;
    }
    $http({
      method: 'POST',
      url: url,
      data: $.param($scope.contact),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).success(function(response){
      console.log(response);
      location.reload();
    }).error(function(response){
      console.log(response);
      alert('This is embarassing. An error has occured. Please check the log for details');
    });
  }

  // delete record
  $scope.confirmDelete = function(id){
    var isConfirmDelete = confirm('Are you sure want this record?');
    if (isConfirmDelete) {
      $http({
        method: 'DELETE',
        url: API_URL + 'contact/' + id
      }).success(function(data){
        console.log(data);
        location.reload();
      }).error(function(data){
        console.log(data);
        alert('Unable to delete');
      });
    }else{
      return false;
    }
  }

  function DaysToBDay(inputBDay) {
    if (!inputBDay) {
      return null;
    }

    var birthday = new Date(inputBDay);
    var today = new Date();

    var currentYear = today.getFullYear();

    var bDayMonth = birthday.getMonth();
    var bDayDD = birthday.getDate() + 1;

    //let oneDay = 24 * 60 * 60 * 1000;
    var bDay = new Date(currentYear, bDayMonth, bDayDD);

    var elapsed = (bDay.getTime() - today.getTime());
    return Math.floor(elapsed / 86400000);
  };

});
