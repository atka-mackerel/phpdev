// app.js

const OUTPUT_TYPE_PREVIEW	= '0';
const OUTPUT_TYPE_FILE		= '1';
const DOWNLOAD_FILE_NAME	= 'output.csv';

let app = angular.module('myApp', ["ngFileUpload"]);

app.config(['$httpProvider', '$qProvider', function ($httpProvider, $qProvider) {
	 $httpProvider.defaults.transformRequest = function(data){
		 if (data === undefined) {
			 return data;
		 }
		 return $.param(data);
	 };
	 $httpProvider.defaults.headers.post = { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' };
	 $qProvider.errorOnUnhandledRejections(false);
 }]);

app.filter('newlines', function($sce) {
	return function (text) {
		return $sce.trustAsHtml(text ? text.replace(/\n|\r\n/g, '<br/>') : '');
	};
});

app.controller('AppController', [ '$scope', '$http', 'Upload', function($scope, $http, Upload) {

	$scope.delimiter = ',';
	$scope.enclosure = '"';
	$scope.delimiterOut = ',';
	$scope.enclosureOut = '"';
	$scope.inputType = '0';
	$scope.outputType = '0';
	$scope.processing = false;

	$('[data-toggle="tooltip"]').tooltip();

	$scope.parseInputData = function() {

		let params = {
				'inputData' : $scope.inputData,
				'enclosure' : $scope.enclosure === 'other' ? $scope.otherEnclosure : $scope.enclosure,
				'delimiter' : $scope.delimiter === 'other' ? $scope.otherDelimiter : $scope.delimiter,
				'enclosureOut' : $scope.enclosureOut === 'other' ? $scope.otherEnclosureOut : $scope.enclosureOut,
			    'delimiterOut' : $scope.delimiterOut === 'other' ? $scope.otherDelimiterOut : $scope.delimiterOut,
				'outputType': $scope.outputType,
		};

		if ($scope.outputType === OUTPUT_TYPE_PREVIEW) {
			$http({
				method : 'POST',
				url : '/tools/csv/parse',
				data : params
			})
			.then(function(result) {
				console.log(result);
				$scope.result = result.data.jsonData;
            	$scope.resultText = result.data.data;
				$('#myModal').modal();
			})
			.catch(function(result) {
				console.log(result);
				alert(result.data.message);
			})
			.finally(function() {
				$scope.processing = false;
			});

		}
		else if ($scope.outputType === OUTPUT_TYPE_FILE) {
			$http({
				method : 'POST',
				url : '/tools/csv/parse',
				data : params
			})
			.then(function(result) {
				$scope.downloadCsvFile(result.data);
			})
			.catch(function(result) {
				console.log(result);
				alert(result.data.message);
			})
			.finally(function() {
				$scope.processing = false;
			});
		}
	};

    $scope.fileupload = function() {
		console.log($scope.files);
        if ($scope.files) {
			let params = {
					'enclosure' : $scope.enclosure === 'other' ? $scope.otherEnclosure : $scope.enclosure,
					'delimiter' : $scope.delimiter === 'other' ? $scope.otherDelimiter : $scope.delimiter,
		    		'enclosureOut' : $scope.enclosureOut === 'other' ? $scope.otherEnclosureOut : $scope.enclosureOut,
		    	    'delimiterOut' : $scope.delimiterOut === 'other' ? $scope.otherDelimiterOut : $scope.delimiterOut,
		    		'outputType': $scope.outputType,
			};
			console.log('params', params);

			if ($scope.outputType === OUTPUT_TYPE_PREVIEW) {
              $scope.upload = Upload.upload({
                   "url":"/tools/csv/parseFile",
                   file: $scope.files,
                   data: params
                })
                .progress(function(progress) {
                	$scope.progress = parseInt(progress.loaded / progress.total * 100.0) + '%完了';
                })
                .success(function(result, status, headers, config) {
                	console.log(result.data);
                	$scope.result = result.jsonData;
                	$scope.resultText = result.data;
                	$('#myModal').modal();
                })
                .error(function(result) {
                	console.log(result);
                	alert(result.message);
                })
                .finally(function(){
                	$scope.processing = false;
                });
			}
			else if ($scope.outputType === OUTPUT_TYPE_FILE) {
				$scope.upload = Upload.upload({
	                   "url":"/tools/csv/parseFile",
	                   file: $scope.files,
	                   data: params
	                })
	                .progress(function(progress) {
	                	$scope.progress = parseInt(progress.loaded / progress.total * 100.0) + '%完了';
	                })
	                .success(function(result, status, headers, config) {
	                	$scope.downloadCsvFile(result);
	                })
	                .error(function(result) {
	                	console.log('result', result);
	                	alert(result.message);
	                })
	                .finally(function(){
	                	$scope.processing = false;
	                });

			}
        }
    };

    $scope.parse = function() {

    	$scope.processing = true;
    	$scope.result = null;
    	$scope.resultText = null;

    	if ($scope.inputType === '0') {
    		$scope.parseInputData();
    	}
    	else if ($scope.inputType === '1') {
    		$scope.fileupload();
    	}

    };

    $scope.parseBtnDisabled = function() {
    	return !($scope.inputType === '0' && $scope.inputData
    		|| $scope.inputType === '1' && $scope.files)
    		|| $scope.processing;
    };

    $scope.downloadCsvFile = function(data)
    {
    	let bom = new Uint8Array([0xEF, 0xBB, 0xBF]);

        if (navigator.appVersion.toString().indexOf('.NET') > 0) {
            window.navigator.msSaveBlob(data, DOWNLOAD_FILE_NAME);
        } else {
            var a = document.createElement("a");
            var blobUrl = window.URL.createObjectURL(new Blob([bom, data], {
                type: 'text/csv'
            }));
            document.body.appendChild(a);
            a.style = "display: none";
            a.href = blobUrl;
            a.download = DOWNLOAD_FILE_NAME;
            a.click();
            document.body.removeChild(a);
        }
    }

} ]);

$(function() {

	console.log(ClipboardJS);
	var clipboard = new ClipboardJS('.clipboardBtn');
    clipboard.on('success', function(e) {
    	alert('コピーしました。');
    });
    clipboard.on('error', function(e) {
    	alert('コピーに失敗しました。');
    });

});
