class ECommerceSellerDetail{constructor(){this.style=getComputedStyle(document.body)}init(){this.initMonthlySales()}initMonthlySales(){var e=document.getElementById("monthlySales"),t={series:[{name:"PRODUCT A",type:"column",data:[23,11,22,27,13,22,37,21,44,22,30]},{name:"PRODUCT B",type:"area",data:[44,55,41,67,22,43,21,41,56,27,43]},{name:"PRODUCT C",type:"line",data:[30,25,36,30,45,35,64,52,59,36,39]}],colors:[this.style.getPropertyValue("--bs-primary"),this.style.getPropertyValue("--bs-success"),this.style.getPropertyValue("--bs-danger")],chart:{height:337,type:"line",stacked:!1,toolbar:{show:!1}},stroke:{width:[0,2,2],curve:"smooth"},plotOptions:{bar:{columnWidth:"50%"}},fill:{opacity:[.85,.25,1],gradient:{inverseColors:!1,shade:"light",type:"vertical",opacityFrom:.85,opacityTo:.55,stops:[0,100,100,100]}},labels:["01/01/2003","02/01/2003","03/01/2003","04/01/2003","05/01/2003","06/01/2003","07/01/2003","08/01/2003","09/01/2003","10/01/2003","11/01/2003"],markers:{size:0},xaxis:{type:"datetime"},yaxis:{title:{text:"Points"},min:0},tooltip:{shared:!0,intersect:!1,y:{formatter:function(e){return void 0!==e?e.toFixed(0)+" points":e}}}};new ApexCharts(e,t).render()}}document.addEventListener("DOMContentLoaded",function(e){(new ECommerceSellerDetail).init()});