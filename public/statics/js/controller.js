function Register($scope, $http){
    $scope.submit = function(user){
        $http.post("/public/index.php/register",user).success(
            function(data, status, headers, config){
                //alert(data["username"]);
                $scope.email= data["email"];
                $scope.username = data["username"];
                $scope.password = data["password"];
                $scope.repeat_password = data["repeat_password"];
            }
        ).error(
            function(data, status, headers, config){
                alert("error");
            }
        )
    }
}
