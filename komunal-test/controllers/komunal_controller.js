//Reference File app.js
myApp.controller('komunal_controller', function ($scope, $state, $http, $location) {
    var vm = this;
  
    $scope.currentPage = 1;
    $scope.maxSize = 3;
    this.search_data = function (search_input) {
        if (search_input.length > 0)
            vm.loadData(1);

    };

    this.loadData = function (page_number) {
        var search_input = document.getElementById("search_input").value;
        $http.get('php/selectkomunal.php?page=' + page_number + '&search_input=' + search_input).then(function (response) {
            vm.komunal_list = response.data.komunal_data;
            $scope.total_row = response.data.total;
        });
    };

    $scope.$watch('currentPage + numPerPage', function () {

        vm.loadData($scope.currentPage);

        var begin = (($scope.currentPage - 1) * $scope.numPerPage)
                , end = begin + $scope.numPerPage;


    });


    this.get_komunal_info = function (komunal_id) {
        $http.get('php/selectonekomunal.php?id=' + komunal_id).then(function (response) {
            vm.view_komunal_info = response.data;


        });
    };


});

