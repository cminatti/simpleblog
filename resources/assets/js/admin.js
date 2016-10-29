
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

if ($('#d3chart').length > 0) {
    var d3 = require("d3");

    var width = 640,
        height = 320,
        radius = Math.min(width, height) / 2;

    var color = d3.scale.category10()

    var arc = d3.svg.arc()
        .outerRadius(radius - 10)
        .innerRadius(0);

    var labelArc = d3.svg.arc()
        .outerRadius(radius - 40)
        .innerRadius(radius - 40);

    var pie = d3.layout.pie()
        .sort(null)
        .value(function(d) { return d.posts.length; });
    
    var svg = d3.select("#d3chart").append("svg")
        .attr("width", width)
        .attr("height", height)
      .append("g")
        .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

    d3.json("/category?json=1", function(error, data) {
      if (error) {
          console.log(error);
          throw error;
      }

      console.log(data);
   
      var total = d3.sum(data,function(d) {
          return d.posts.length;
      })
      
      console.log(total);
        
      var g = svg.selectAll(".arc")
          .data(pie(data))
        .enter().append("g")
          .attr("class", "arc");

      g.append("path")
          .attr("d", arc)
          .style("fill", function(d) { 
              return color(d.data.id); 
            });

      var texts = g.append("text")
         .attr("transform-origin",  "50% 50%") 
          .attr("transform", function(d) { 
              return "translate(" + labelArc.centroid(d) + ")"; })
          .attr("dy", ".35em")
          .style('fill', '#ccc')
           .append('svg:tspan')
            .attr('x', 0)
            .attr('dy', 5)
            .text(function(d) { return d.data.name; })
            .append('svg:tspan')
            .attr('x', 0)
            .attr('dy', 20)
            .text(function(d) { return d.data.posts.length + ' Posts'; })
            .append('svg:tspan')
            .attr('x', 0)
            .attr('dy', 20)
            .text(function(d) { 
                var p = d.data.posts.length / total;
                return p.toFixed(2) + "%"; })
          
        
    });
}