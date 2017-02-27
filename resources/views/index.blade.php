<!DOCTYPE html>
<html lang="en" ng-app="getContact">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact list application</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
    <body>
      <div class="container">
        <h2>Contact List Application</h2>
        <div ng-controller="ContactController">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone Number</th>
                <th>Birh day</th>
                <th>Information</th>
                <th>
                  <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Add New Contact</button>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="contact in contacts" ng-class="(contact.daysToBDay <= 5 && contact.daysToBDay > 0) ? 'danger' : ((contact.daysToBDay <= 10 && contact.daysToBDay > 0) ?  'warning' : '')">
                <td>@{{ contact.id }}</td>
                <td>@{{ contact.name }}</td>
                <td>@{{ contact.surname }}</td>
                <td>@{{ contact.phone_number }}</td>
                <td>@{{ contact.birth_day }}</td>
                <td>@{{ contact.info }}</td>
                <td>
                  <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', contact.id)">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
                  <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(contact.id)">
                    <span class="glyphicon glyphicon-trash"></span>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <!--show modal-->

          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                </div>
                <div class="modal-body">
                  <form name="frmContact" class="form-horizontal" novalidate="">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Contact Name" value="@{{name}}" ng-model="contact.name" ng-required="true">
                      <span ng-show="frmContact.name.$invalid && frmContact.name.$touched">Contact Name field is required</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Surname</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="surname" name="surname" placeholder="Contact Surname" value="@{{surname}}" ng-model="contact.surname" ng-required="true">
                      <span ng-show="frmContact.surname.$invalid && frmContact.surname.$touched">Contact Surname field is required</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Phone Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Contact Phone Number" value="@{{phone_number}}" ng-model="contact.phone_number" ng-required="true">
                      <span ng-show="frmContact.phone_number.$invalid && frmContact.phone_number.$touched">Contact Phone Number field is required</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Birth Day</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="birth_day" name="birth_day"  placeholder="Contact Birth Day: XXXX-XX-XX" value="@{{birth_day}}" ng-model="contact.birth_day" ng-required="true">
                      <span ng-show="frmContact.birth_day.$invalid && frmContact.birth_day.$touched">Contact Birth Day field is required</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Information</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="info" name="info" placeholder="Contact Information" value="@{{info}}" ng-model="contact.info" ng-required="true">
                      <span ng-show="frmContact.info.$invalid && frmContact.info.$touched">Contact Information field is required</span>
                    </div>
                  </div>


                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmContact.$invalid">Save Changes</button>
              </div>


              </div>
            </div>
          </div>

        </div>
      </div>












    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Aangular Material load from CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>

    <!-- Angular Application Scripts Load  -->
    <script src="{{ asset('angular/app.js') }}"></script>
    <script src="{{ asset('angular/controllers/ContactController.js') }}"></script>
  </body>
</html>
