
   reverse = false;
   traffic = false;
   thestring = '';
   function toggleReverse() {
      reverse = !reverse;
      if(reverse) document.getElementById('direction').innerHTML = "Direction: Reverse";
      else document.getElementById('direction').innerHTML = "Direction: Forward";
   }
   function toggleTraffic() {
      traffic = !traffic;
      if(traffic) document.getElementById('traffic').innerHTML = "Traffic: On";
      else document.getElementById('traffic').innerHTML = "Traffic: Off";
   }
   function updateHalf() {
      thestring = thestring_base + "&reverse=" + reverse + "&traffic=" + traffic;
      ajaxFunction("best_laps");
      ajaxFunction("total_times");
      ajaxFunction("big_airs");
   }
   function updateAll() {
      updateHalf();
      ajaxFunction("big_crashes");
      ajaxFunction("race_crash_totals");
      ajaxFunction("most_cars_in_crashes");
   }
   function ajaxFunction(category) {
      var ajax = new XMLHttpRequest();
      ajax.open("GET", thestring + "&category=" + category, true);
      ajax.send();
      ajax.onreadystatechange = function() {
         if(/* this.readystate == 4 && */ this.status == 200) {
            document.getElementById(category).innerHTML = this.responseText;
         }
      }
   }