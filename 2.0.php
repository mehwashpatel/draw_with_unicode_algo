<h1>Draw hierarchy with the following unicode characters │ (U+2502),└ (U+2514)</h1>
<input type="button" id="create" value="Click here 1" onclick="Javascript:addTable(1)">
	<input type="button" id="create" value="Click here 2" onclick="Javascript:addTable(2)">
	<input type="button" id="create" value="Click here 3" onclick="Javascript:addTable(3)">
<div id="metric_results">
   
</div>
<script>
function createTable(tableContents){
	var myTableDiv = document.getElementById("metric_results")
    var table = document.createElement('TABLE')
    var tableBody = document.createElement('TBODY')
	myTableDiv.innerHTML = '';
    table.appendChild(tableBody);
	
	 for (i = 0; i < tableContents.length; i++) {
        var tr = document.createElement('TR');
        for (j = 0; j < tableContents[i].length; j++) {
            var td = document.createElement('TD')
            td.appendChild(document.createTextNode(tableContents[i][j]));
            tr.appendChild(td)
        }
        tableBody.appendChild(tr);
    } 
	
    myTableDiv.appendChild(table)
}

function addTable(inputNo) {
	
	const input1 = inputNo == 1 ? [["A", null], ["B", "A"], ["C", "B"], ["D" ,"C"]] :
				inputNo == 2 ? [["A", null], ["B", "A"], ["C", "B"], ["D", "B"], ["E", "A"]] :
				[["A", null], ["B", "A"], ["C", "B"], ["D", "C"], ["E", "A"]];

	var tableContents = new Array();
	var tableIndex = new Array();
	
	const L = '\u2514';
	const I = '\u2502';
	
	for(input1Ctr = 0; input1Ctr < input1.length; input1Ctr++){
		if(input1[input1Ctr][1] == null){
			tableContents[input1Ctr] = new Array(input1[input1Ctr][0]);
			tableIndex[input1[input1Ctr][0]] = input1Ctr;
		}else{
			var parentIndex = tableIndex[input1[input1Ctr][1]];
			parentIndex = parseInt(parentIndex);
			tableContents[input1Ctr] = new Array(parentIndex).fill('');
			
			var unicodeL = 1;
			if(unicodeL == 1){
				tableContents[input1Ctr].push(L);
			}
			
			tableContents[input1Ctr].push(input1[input1Ctr][0]);
			
			if(input1Ctr - tableIndex[input1[input1Ctr][1]] > 1){
			for(n=0; n<tableContents.length; n++){
				if(tableContents[n][parentIndex] == ''){
					tableContents[n][parentIndex] = I;
				}
				console.log(tableContents[n][parentIndex]);
			}
			}
			tableIndex[input1[input1Ctr][0]] = input1Ctr;
			
		}
	}
	
	createTable(tableContents);
}
</script>