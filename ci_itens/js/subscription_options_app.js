var app = angular.module('app', ['ui.sortable']);

app.controller('OptionsController', ['$scope',
    function($scope) {

        $scope.opts = [{
            ordem: 0,
            titulo: "nome",
            resumo: "meu texto",
            status: 1
        }, {
            ordem: 2,
            titulo: "nome 2",
            resumo: "meu texto",
            status: 1
        }, {
            ordem: 1,
            titulo: "nome 1",
            resumo: "meu texto",
            status: 1
        }];


        $scope.sortableOptions = {
            update: function(e, ui) {
                console.log('updated', ui.item.scope().opt.titulo);
            },
            stop: function(e, ui) {
                console.log('stoped', ui.item.scope().opt.titulo);
            },
            removed: function(e, ui) {
                console.log('removed', ui.item.scope().opt.titulo);
            },
            axis: 'y'
        };

    }
]);