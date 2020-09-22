function(){
  var assets = [];
          var prev0, prev1, prev2;

         
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
                  alert('wah');
                  this.value = prev2;
                  $(this).trigger('chosen:updated');
                }
              }else{
                assets.splice(assets.indexOf(prev2),1);
                assets.push("");
              }
            } 
             
            
          });
 });