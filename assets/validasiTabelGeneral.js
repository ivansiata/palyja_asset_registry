$(document).ready(function(){ 
  var assets = [];

  var prev0, prev1, prev2, prev3, prev4, prev5, prev6, prev7, prev8, prev9;

         
          $('#name0').focus(function(){
            prev0 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev0 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev0),1);
                if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev0 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');

                if(typeof prev0 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev0 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev0;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev0),1);
                assets.push("");
              }
            }
            
            
          });

          $('#name1').focus(function(){
            prev1 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev1 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev1),1);
                 if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev1 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');
                if(typeof prev1 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                  }else if(prev1 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                  }else{
                  this.value = prev1;
                  $(this).trigger('chosen:updated');
                  }
              }else{
                assets.splice(assets.indexOf(prev1),1);
                assets.push("");
              }
            }
            
            
          });

          $('#name2').focus(function(){
            prev2 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev2 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev2),1);
                 if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev2 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');
                if(typeof prev2 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev2 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev2;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev2),1);
                assets.push("");
              }
            } 
             
             
          });

          $('#name3').focus(function(){
            prev3 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev3 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev3),1);
                if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev3 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');

                if(typeof prev3 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev3 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev3;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev3),1);
                assets.push("");
              }
            }
            
            
          });

           $('#name4').focus(function(){
            prev4 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev4 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev4),1);
                if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev4 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');

                if(typeof prev4 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev4 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev4;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev4),1);
                assets.push("");
              }
            }
            
            
          });

           $('#name5').focus(function(){
            prev5 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev5 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev5),1);
                if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev5 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');

                if(typeof prev5 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev5 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev5;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev5),1);
                assets.push("");
              }
            }
            
            
          });

           $('#name6').focus(function(){
            prev6 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev6 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev6),1);
                if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev6 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');

                if(typeof prev6 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev6 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev6;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev6),1);
                assets.push("");
              }
            }
            
            
          });

           $('#name7').focus(function(){
            prev7 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev7 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev7),1);
                if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev7 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');

                if(typeof prev7 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev7 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev7;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev7),1);
                assets.push("");
              }
            }
            
            
          });

           $('#name8').focus(function(){
            prev8 = this.value;
          }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev8 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev8),1);
                if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev8 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');

                if(typeof prev8 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev8 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev8;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev7),1);
                assets.push("");
              }
            }

            });

            $('#name9').focus(function(){
            prev9 = this.value;
            }).change(function(){
            if(assets.indexOf(this.value) === -1){
              if(typeof prev9 === "undefined"){
                 assets.push(this.value);
              }else{
                assets.splice(assets.indexOf(prev9),1);
                if(this.value != " "){
                  assets.push(this.value);
                }
              }
              prev9 = this.value;
            }else{
              if(this.value != ""){
                alert('Name Duplicated!');

                if(typeof prev9 === "undefined"){  
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else if(prev9 == ""){
                  this.value = "";
                  $(this).trigger('chosen:updated');
                }else{
                  this.value = prev9;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev9),1);
                assets.push("");
              }
            }
            
            
          });
         /* $('.name').on('change', function(){
          $('#result').html(assets.toString());
        }); */
 });
