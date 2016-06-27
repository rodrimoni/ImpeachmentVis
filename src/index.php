<!DOCTYPE html>
<meta charset="utf-8">
<title>Parallel Sets</title>
<style>
@import url(css/d3.parsets.css);
@import url(css/bootstrap.css);

body {
  font-family: sans-serif;
  font-size: 16px;
  width: 960px;
  margin: 1em auto;
  position: relative;
}
h1, h2, .dimension text {
  text-align: center;
  font-family: "PT Sans", Helvetica;
  font-weight: 300;
}
h1 {
  font-size: 4em;
  margin: .5em 0 0 0;
}
h2 {
  font-size: 2em;
  margin: 1em 0 0.5em;
  border-bottom: solid #ccc 1px;
}
p.meta, p.footer {
  font-size: 13px;
  color: #333;
}
p.meta {
  text-align: center;
}

text.icicle { pointer-events: none; }

.options { font-size: 12px; text-align: center; padding: 5px 0; }
.curves { float: left; }
.source { float: right; }
pre, code { font-family: "Menlo", monospace; }

.html .value,
.javascript .string,
.javascript .regexp {
  color: #756bb1;
}

.html .tag,
.css .tag,
.javascript .keyword {
  color: #3182bd;
}

.comment {
  color: #636363;
}

.html .doctype,
.javascript .number {
  color: #31a354;
}

.html .attribute,
.css .attribute,
.javascript .class,
.javascript .special {
  color: #e6550d;
}
</style>

<body>
<h1>Parallel Sets</h1>
<p class="meta">A visualisation technique for multidimensional categorical data.

<h2>Titanic Survivors</h2>
<div id="vis"><noscript><img src="parsets.png"></noscript></div>
<div class="options">
  <span class="source">Data: <a href="http://www.amstat.org/publications/jse/v3n3/datasets.dawson.html">Robert J. MacG. Dawson</a>.</span>
  <span class="curves"><label for="curved"><input type="checkbox" id="curved" onchange="curves.call(this)"> Curves?</label></span>
</div>

<h2>Explanation</h2>
<p>For each dimension (Survived, Sex, Age and Class), a horizontal bar is shown for each of its possible categories.  The width of the bar denotes the absolute number of matches for that category.
<p>Starting with the first dimension (Survived), each of its categories is connected to a number of categories in the next dimension, showing how that category is subdivided. This subdividing is repeated recursively, producing a tree of “ribbons”.
<p>In fact, you can imagine Parallel Sets as being an icicle plot, with icicles of the same category being “bundled” together.
<p style="text-align: center"><label for="icicle" style="font-style: italic"><input type="checkbox" id="icicle"> Show icicle plot!</label>
<p>Drag the dimensions and categories to reorder them. You can also click the “alpha” or “size” links that appear next to the dimension name on mouseover, to order the categories by name or frequency.

<h2>Women and Children First?</h2>

<p>We can see at a glance that the relative proportion of surviving women is far greater than that of the men.
<p>As for children, it becomes clearer when we drag the <em>Age</em> dimension up: around half the children survived.  This is proportionally less than the women but more than the men.  Can you spot anything else interesting?

<h2>Do It Yourself</h2>
<p>The code is available as a reusable <a href="http://d3js.org/">D3.js</a> chart: <a href="http://github.com/jasondavies/d3-parsets">d3.parsets</a>.  This is a configurable function, which can be called on a D3 selection to produce an interactive SVG visualisation.
<p>The input data should be bound to the target selection.  For input, you can either use an array of aggregated objects (pivot table) along with a <a href="http://github.com/jasondavies/d3-parsets#parsets_value">value</a> accessor, or you can simply use the full dataset and the grouped frequencies will be calculated automatically by default.

<pre><code>var chart = d3.parsets()
      .dimensions(["Survived", "Sex", "Age", "Class"]);

var vis = d3.select("#vis").append("svg")
    .attr("width", chart.width())
    .attr("height", chart.height());

d3.csv("titanic.csv", function(error, csv) {
  vis.datum(csv).call(chart);
});</code></pre>


<h2>Alternatives</h2>
<p>For multivariate categorical data, the <a href="http://www.theusrus.de/blog/understanding-mosaic-plots/">mosaic plot</a> (or Marimekko chart) is a powerful alternative.  Personally, I think it’s easier to see the order in which the subsets were derived in a parallel sets visualisation.  On the other hand, it seems easier to spot small disparities in a mosaic plot because the subsets are laid out side-by-side.  Here is a <a href="http://bl.ocks.org/1005090">Marimekko chart</a> in D3.js by <a href="http://bost.ocks.org/mike/">Mike Bostock</a>.
<p>For multivariate ordinal data (such as numeric data), <a href="http://en.wikipedia.org/wiki/Parallel_coordinates">parallel coordinates</a> are more appropriate, although you can often generate meaningful categories from such data for use with parallel sets.

<h2>Implementation Notes</h2>

<p>Probably the most interesting part of implementing this was supporting multiple concurrent transitions on the ribbons.  Strictly speaking this wasn’t necessary as it’s unlikely anyone would drag two things within the transition duration.  But who would pass up an opportunity to use a <a href="http://github.com/mbostock/d3/wiki/Transitions#wiki-tween">custom tween</a>?

<p>This allows the <em>x-</em> and <em>y-</em> components of the ribbons to be animated independently, so that you can drag a dimension vertically even though a horizontal category animation is in progress.

<p><label for="slow"><input type="checkbox" id="slow" onchange="vis.call(chart.duration(this.checked ? 5000 : 500))"> Go slow!</label>

<p>In case you missed it, be sure to click on “icicle plots” in the Explanation section to see the animated transition.

<p><a href="http://news.ycombinator.com/item?id=3878877">Discuss on HN!</a>

<h2>Further Reading</h2>
<ul>
  <li>Functionality based on <a href="http://eagereyes.org/parallel-sets">Parallel Sets</a> by <a href="http://coitweb.uncc.edu/~rkosara/">Robert Kosara</a> and <a href="http://www.cs.brown.edu/people/cziemki/">Caroline Ziemkiewicz</a>.
  <li><a href="http://kosara.net/publications/Kosara_BeautifulVis_2010.html">Turning a Table into a Tree: Growing Parallel Sets into a Purposeful Project</a> by Robert Kosara.
  <li><a href="http://kosara.net/publications/Bendix_InfoVis_2005.html">Parallel Sets: Visual Analysis of Categorical Data</a> by Fabian Bendix, Robert Kosara, Helwig Hauser.
</ul>

<p class="footer">Made by <a href="http://www.jasondavies.com/">Jason Davies</a>.  Thanks to <a href="http://bost.ocks.org/mike">Mike Bostock</a> for his suggestions (and of course, <a href="http://d3js.org/">D3.js</a>!)

<script src="../d3.min.js"></script>
<script src="../jquery.js"></script>
<script src="../bootstrap.js"></script>
<script src="js/d3.parsets.js"></script>
<script src="js/highlight.min.js"></script>
<script src="js/jquery.mixitup.min.js"></script>

<script>
var chart = d3.parsets()
    .dimensions(["Voto", "Ideologia", "Região", "Gênero"]);

var vis = d3.select("#vis").append("svg")
    .attr("width", chart.width())
    .attr("height", chart.height());

var partition = d3.layout.partition()
    .sort(null)
    .size([chart.width(), chart.height() * 5 / 4])
    .children(function(d) { return d.children ? d3.values(d.children) : null; })
    .value(function(d) { return d.count; });

var ice = false;

function curves() {
  var t = vis.transition().duration(500);
  if (ice) {
    t.delay(1000);
    icicle();
  }
  t.call(chart.tension(this.checked ? .5 : 1));
}

d3.csv("DeputadosRegIde.csv", function(error, csv) {
  vis.datum(csv).call(chart);

  window.icicle = function() {
    var newIce = this.checked,
        tension = chart.tension();
    if (newIce === ice) return;
    if (ice = newIce) {
      var dimensions = [];
      vis.selectAll("g.dimension")
         .each(function(d) { dimensions.push(d); });
      dimensions.sort(function(a, b) { return a.y - b.y; });
      var root = d3.parsets.tree({children: {}}, csv, dimensions.map(function(d) { return d.name; }), function() { return 1; }),
          nodes = partition(root),
          nodesByPath = {};
      nodes.forEach(function(d) {
        var path = d.data.name,
            p = d;
        while ((p = p.parent) && p.data.name) {
          path = p.data.name + "\0" + path;
        }
        if (path) nodesByPath[path] = d;
      });
      var data = [];
      vis.on("mousedown.icicle", stopClick, true)
        .select(".ribbon").selectAll("path")
          .each(function(d) {
            var node = nodesByPath[d.path],
                s = d.source,
                t = d.target;
            s.node.x0 = t.node.x0 = 0;
            s.x0 = t.x0 = node.x;
            s.dx0 = s.dx;
            t.dx0 = t.dx;
            s.dx = t.dx = node.dx;
            data.push(d);
          });
      iceTransition(vis.selectAll("path"))
          .attr("d", function(d) {
            var s = d.source,
                t = d.target;
            return ribbonPath(s, t, tension);
          })
          .style("stroke-opacity", 1);
      iceTransition(vis.selectAll("text.icicle")
          .data(data)
        .enter().append("text")
          .attr("class", "icicle")
          .attr("text-anchor", "middle")
          .attr("dy", ".3em")
          .attr("transform", function(d) {
            return "translate(" + [d.source.x0 + d.source.dx / 2, d.source.dimension.y0 + d.target.dimension.y0 >> 1] + ")rotate(90)";
          })
          .text(function(d) { return d.source.dx > 15 ? d.node.name : null; })
          .style("opacity", 1e-6))
          .style("opacity", 1);
      iceTransition(vis.selectAll("g.dimension rect, g.category")
          .style("opacity", 1))
          .style("opacity", 1e-6)
          .each("end", function() { d3.select(this).attr("visibility", "hidden"); });
      iceTransition(vis.selectAll("text.dimension"))
          .attr("transform", "translate(0,-5)");
      vis.selectAll("tspan.sort").style("visibility", "hidden");
    } else {
      vis.on("mousedown.icicle", null)
        .select(".ribbon").selectAll("path")
          .each(function(d) {
            var s = d.source,
                t = d.target;
            s.node.x0 = s.node.x;
            s.x0 = s.x;
            s.dx = s.dx0;
            t.node.x0 = t.node.x;
            t.x0 = t.x;
            t.dx = t.dx0;
          });
      iceTransition(vis.selectAll("path"))
          .attr("d", function(d) {
            var s = d.source,
                t = d.target;
            return ribbonPath(s, t, tension);
          })
          .style("stroke-opacity", null);
      iceTransition(vis.selectAll("text.icicle"))
          .style("opacity", 1e-6).remove();
      iceTransition(vis.selectAll("g.dimension rect, g.category")
          .attr("visibility", null)
          .style("opacity", 1e-6))
          .style("opacity", 1);
      iceTransition(vis.selectAll("text.dimension"))
          .attr("transform", "translate(0,-25)");
      vis.selectAll("tspan.sort").style("visibility", null);
    }
  };
  d3.select("#icicle")
      .on("change", icicle)
      .each(icicle);
});

function iceTransition(g) {
  return g.transition().duration(1000);
}

function ribbonPath(s, t, tension) {
  var sx = s.node.x0 + s.x0,
      tx = t.node.x0 + t.x0,
      sy = s.dimension.y0,
      ty = t.dimension.y0;
  return (tension === 1 ? [
      "M", [sx, sy],
      "L", [tx, ty],
      "h", t.dx,
      "L", [sx + s.dx, sy],
      "Z"]
   : ["M", [sx, sy],
      "C", [sx, m0 = tension * sy + (1 - tension) * ty], " ",
           [tx, m1 = tension * ty + (1 - tension) * sy], " ", [tx, ty],
      "h", t.dx,
      "C", [tx + t.dx, m1], " ", [sx + s.dx, m0], " ", [sx + s.dx, sy],
      "Z"]).join("");
}

function stopClick() { d3.event.stopPropagation(); }

// Given a text function and width function, truncates the text if necessary to
// fit within the given width.
function truncateText(text, width) {
  return function(d, i) {
    var t = this.textContent = text(d, i),
        w = width(d, i);
    if (this.getComputedTextLength() < w) return t;
    this.textContent = "…" + t;
    var lo = 0,
        hi = t.length + 1,
        x;
    while (lo < hi) {
      var mid = lo + hi >> 1;
      if ((x = this.getSubStringLength(0, mid)) < w) lo = mid + 1;
      else hi = mid;
    }
    return lo > 1 ? t.substr(0, lo - 2) + "…" : "";
  };
}

d3.select("#file").on("change", function() {
  var file = this.files[0],
      reader = new FileReader;
  reader.onloadend = function() {
    var csv = d3.csv.parse(reader.result);
    vis.datum(csv).call(chart
        .value(csv[0].hasOwnProperty("Number") ? function(d) { return +d.Number; } : 1)
        .dimensions(function(d) { return d3.keys(d[0]).filter(function(d) { return d !== "Number"; }).sort(); }));
  };
  reader.readAsText(file);
});
</script>

<style>

.axis path,
.axis line{
  fill: none;
  stroke: black;
}

.tick line{
    opacity: 0.2;
}

.point {
        stroke: grey;
        stroke-width: 3px;
        opacity: 0;
      }
      .point:hover{
        opacity: .5;
      }
}
</style>

<script>

var margin = {top: 20, right: 55, bottom: 30, left: 40},
          width  = 1000 - margin.left - margin.right,
          height = 500  - margin.top  - margin.bottom;

      var x = d3.scale.ordinal()
          .rangeRoundBands([0, width], .1);

      var y = d3.scale.linear()
          .rangeRound([height, 0]);

      var xAxis = d3.svg.axis()
          .scale(x)
          .orient("bottom")
          .innerTickSize(-height)
          .outerTickSize(0)
          .tickPadding(10);

      var yAxis = d3.svg.axis()
          .scale(y)
          .orient("left")
          .innerTickSize(-width)
          .outerTickSize(0)
          .tickPadding(10);

      var stack = d3.layout.stack()
          .offset("zero")
          .values(function (d) { return d.values; })
          .x(function (d) { return x(d.label) + x.rangeBand() / 2; })
          .y(function (d) { return d.value; });

      var area = d3.svg.area()
          .interpolate("cardinal")
          .x(function (d) { return x(d.label) + x.rangeBand() / 2; })
          .y0(function (d) { return y(d.y0); })
          .y1(function (d) { return y(d.y0 + d.y); });

      var color = d3.scale.ordinal()
          .range(["#df2020","#345ee8"]);

      var svg = d3.select("body").append("svg")
          .attr("width",  width  + margin.left + margin.right)
          .attr("height", height + margin.top  + margin.bottom)
        .append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      d3.csv("data.csv", function (error, data) {

        var labelVar = 'estado';
        var varNames = d3.keys(data[0])
            .filter(function (key) { return key !== labelVar;});
        color.domain(varNames);

        var seriesArr = [], series = {};
        varNames.forEach(function (name) {
          series[name] = {name: name, values:[]};
          seriesArr.push(series[name]);
        });

        data.forEach(function (d) {
          varNames.map(function (name) {
            series[name].values.push({name: name, label: d[labelVar], value: +d[name]});
          });
        });

        x.domain(data.map(function (d) { return d.estado; }));

        stack(seriesArr);

        y.domain([0, d3.max(seriesArr, function (c) { 
            return d3.max(c.values, function (d) { return d.y0 + d.y; });
          })]);

        svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);

        svg.append("g")
            .attr("class", "y axis")
            .call(yAxis)
          .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", 6)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .text("Number of Votes");

        var selection = svg.selectAll(".series")
          .data(seriesArr)
          .enter().append("g")
            .attr("class", "series");

        selection.append("path")
          .attr("class", "streamPath")
          .attr("d", function (d) { return area(d.values); })
          .style("fill", function (d) { return color(d.name); })
          .style("stroke", "black");

        var points = svg.selectAll(".seriesPoints")
          .data(seriesArr)
          .enter().append("g")
            .attr("class", "seriesPoints");

        points.selectAll(".point")
          .data(function (d) { return d.values; })
          .enter().append("circle")
           .attr("class", "point")
           .attr("cx", function (d) { return x(d.label) + x.rangeBand() / 2; })
           .attr("cy", function (d) { return y(d.y0 + d.y); })
           .attr("r", "10px")
           .style("fill",function (d) { return color(d.name); })
           .on("mouseover", function (d) { showPopover.call(this, d); })
           .on("mouseout",  function (d) { removePopovers(); })

        var legend = svg.selectAll(".legend")
            .data(varNames.slice().reverse())
          .enter().append("g")
            .attr("class", "legend")
            .attr("transform", function (d, i) { return "translate(55," + i * 20 + ")"; });

        legend.append("rect")
            .attr("x", width - 10)
            .attr("width", 10)
            .attr("height", 10)
            .style("fill", color)
            .style("stroke", "grey");

        legend.append("text")
            .attr("x", width - 12)
            .attr("y", 6)
            .attr("dy", ".35em")
            .style("text-anchor", "end")
            .text(function (d) { return d; });

        svg.selectAll(".x.axis .tick")
            .style("cursor", "pointer")
            .on("click", function(d) {showDistrict(d);})

        function showDistrict(d)
        {
          var id = '#' + d;
          //alert(id);
          $('.deputies').hide();
          $(id).show();
          $(id).mixItUp();
          $("#todos").addClass('active'); 
          $('html, body').animate({ scrollTop: $(id).offset().top }, 'slow');
        }

        function removePopovers () {
          $('.popover').each(function() {
            $(this).remove();
          }); 
        }

        function showPopover (d) {
          $(this).popover({
            title: d.name,
            placement: 'auto top',
            container: 'body',
            trigger: 'manual',
            html : true,
            content: function() { 
              return "Estado: " + d.label + 
                     "<br/>Votos: " + d3.format(",")(d.value ? d.value: d.y1 - d.y0); }
          });
          $(this).popover('show')
        }

      });
</script>

<script>

</script>

<style>
.sim {
    display:inline-block;
    position: relative;
}
.sim:after {
    content:'';
    top: 0;
    left: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    background: #70d3ff;
    opacity: 0.5;
}

.nao {
    display:inline-block;
    position: relative;
}
.nao:after {
    content:'';
    top: 0;
    left: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    background: #ff5f68;
    opacity: 0.5;
}

</style>

<?php
  
  function removeAcentos($string, $slug = false) {
    $string = strtolower($string);
    // Código ASCII das vogais
    $ascii['a'] = range(224, 230);
    $ascii['e'] = range(232, 235);
    $ascii['i'] = range(236, 239);
    $ascii['o'] = array_merge(range(242, 246), array(240, 248));
    $ascii['u'] = range(249, 252);
    // Código ASCII dos outros caracteres
    $ascii['b'] = array(223);
    $ascii['c'] = array(231);
    $ascii['d'] = array(208);
    $ascii['n'] = array(241);
    $ascii['y'] = array(253, 255);
    foreach ($ascii as $key=>$item) {
      $acentos = '';
      foreach ($item AS $codigo) $acentos .= chr($codigo);
      $troca[$key] = '/['.$acentos.']/i';
    }
    $string = preg_replace(array_values($troca), array_keys($troca), $string);
    // Slug?
    if ($slug) {
      // Troca tudo que não for letra ou número por um caractere ($slug)
      $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
      // Tira os caracteres ($slug) repetidos
      $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
      $string = trim($string, $slug);
    }
    return $string;
  }

  $deputiesByState = array();
  $deputiesAllInfo = array();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Deputados";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT * FROM impeatchment";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $state = $row['Estado'];
          $aDeputy = removeAcentos($row["Deputado"], '-') . "-" . strtolower($row['Partido']);
          $deputiesByState[$state][] = $aDeputy;
          $deputiesAllInfo[$aDeputy]['Deputado'] = $row["Deputado"];
          $deputiesAllInfo[$aDeputy]['Partido'] = $row["Partido"];
          $deputiesAllInfo[$aDeputy]['Estado'] = $row["Estado"];
          $deputiesAllInfo[$aDeputy]['Voto'] = $row["Voto"];
          $deputiesAllInfo[$aDeputy]['Fala'] = $row["Fala"];
          $deputiesAllInfo[$aDeputy]['Genero'] = $row["Genero"];
      }
  } else {
      echo "0 results";
  }

  $parties = array();

  $sql = "SELECT DISTINCT Partido from impeatchment";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $parties[] = $row['Partido'];
      }
  } else {
      echo "0 results";
  }

  ?>

  <style>

  .dropdown {
    position: relative;
    display: inline-block;
    margin-left: 40px;
  }

  .dropdown .btn {
    width: 155px; 
  }

  </style>

  <div class = "text-center">
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Partido
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="javascript:;" data-filter="all" class="active filter">Todos Partidos</a></li>
        <?php foreach ($parties as $p):?> 
            <li> <a href="javascript:;" data-filter = <?php echo "'." . $p  . "'" ?> class="filter"> <?php echo $p ?> </a></li>
        <?php endforeach?>
      </ul>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Voto
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="#">Sim</a></li>
        <li><a href="#">Não</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Gênero
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li> <a href="javascript:;" data-filter = '.Masculino' class="filter"> Masculino </a></li>
        <li> <a href="javascript:;" data-filter = '.Feminino' class="filter"> Feminino </a></li>
      </ul>
    </div> 
  </div>
  <?php

  //echo "<div class = 'deputies'>";

  foreach ($deputiesByState as $key => $value) {
    echo "<div class = 'deputies' style='display:none;' id = '" . $key . "'>";
    foreach ($value as $index => $deputy) {
        $voto = $deputiesAllInfo[$deputy]['Voto'] == "Sim" ? "sim" : "nao"; 
        echo "<div class = 'mix ". $deputiesAllInfo[$deputy]['Partido'] . " " . $deputiesAllInfo[$deputy]['Genero'] .  "'>";
          echo "<div class = '". $voto . "'>";
            echo "<img align='left' class = 'img-rounded' src='img/deputados/" . $deputy . ".jpg'/>";
          echo "</div>";
        echo "</div>";
    }
    echo "</div>";
  }

  //echo "</div>";

  $conn->close();
?>


</body>

<style>

.deputies{
  padding: 2% 2% 0;
  text-align: justify;
  font-size: 0.1px;
  
  -webkit-backface-visibility: hidden;
}

.deputies:after{
  content: '';
  display: inline-block;
  width: 100%;
}

.deputies .mix,
.deputies .gap{
  display: inline-block;
  width: 25%;
}

.deputies .mix{
  text-align: left;
  margin-bottom: 2%;
  display: none;
}

.deputies .mix:after{
  content: attr(data-myorder);
  color: white;
  font-size: 16px;
  display: inline-block;
  vertical-align: top;
  padding: 4% 6%;
  font-weight: 700;
}

.deputies .mix:before{
  content: '';
  display: inline-block;
  padding-top: 60%;
}


</style>
