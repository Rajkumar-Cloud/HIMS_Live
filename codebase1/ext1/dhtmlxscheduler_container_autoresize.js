/*
@license
dhtmlxScheduler v.5.0.0 Professional Evaluation

This software is covered by DHTMLX Evaluation License. Contact sales@dhtmlx.com to get Commercial or Enterprise license. Usage without proper license is prohibited.

(c) Dinamenta, UAB.
*/
Scheduler.plugin(function(e){!function(){e.config.container_autoresize=!0,e.config.month_day_min_height=90,e.config.min_grid_size=25,e.config.min_map_size=400;var t=e._pre_render_events,i=!0,a=0,r=0;e._pre_render_events=function(n,s){if(!e.config.container_autoresize||!i)return t.apply(this,arguments);var d=this.xy.bar_height,l=this._colsS.heights,o=this._colsS.heights=[0,0,0,0,0,0,0],h=this._els.dhx_cal_data[0];if(n=this._table_view?this._pre_render_events_table(n,s):this._pre_render_events_line(n,s),
this._table_view)if(s)this._colsS.heights=l;else{var _=h.firstChild;if(_.rows){for(var c=0;c<_.rows.length;c++){if(o[c]++,o[c]*d>this._colsS.height-this.xy.month_head_height){var u=_.rows[c].cells,g=this._colsS.height-this.xy.month_head_height;1*this.config.max_month_events!==this.config.max_month_events||o[c]<=this.config.max_month_events?g=o[c]*d:(this.config.max_month_events+1)*d>this._colsS.height-this.xy.month_head_height&&(g=(this.config.max_month_events+1)*d);for(var f=0;f<u.length;f++)u[f].childNodes[1].style.height=g+"px";
    o[c] = (o[c - 1] || 0) + u[0].offsetHeight
} o[c] = (o[c - 1] || 0) + _.rows[c].cells[0].offsetHeight
} o.unshift(0), _.parentNode.offsetHeight < _.parentNode.scrollHeight && !_._h_fix
} else if (n.length || "visible" != this._els.dhx_multi_day[0].style.visibility || (o[0] = -1), n.length || -1 == o[0]) {
    var v = (_.parentNode.childNodes, (o[0] + 1) * d + 1); r != v + 1 && (this._obj.style.height = a - r + v - 1 + "px"), v += "px", h.style.top = this._els.dhx_cal_navline[0].offsetHeight + this._els.dhx_cal_header[0].offsetHeight + parseInt(v, 10) + "px", h.style.height = this._obj.offsetHeight - parseInt(h.style.top, 10) - (this.xy.margin_top || 0) + "px";
        var m = this._els.dhx_multi_day[0]; m.style.height = v, m.style.visibility = -1 == o[0] ? "hidden" : "visible", m = this._els.dhx_multi_day[1], m.style.height = v, m.style.visibility = -1 == o[0] ? "hidden" : "visible", m.className = o[0] ? "dhx_multi_day_icon" : "dhx_multi_day_icon_small", this._dy_shift = (o[0] + 1) * d, o[0] = 0
    }
    } return n
};
    var n = ["dhx_cal_navline", "dhx_cal_header", "dhx_multi_day", "dhx_cal_data"], s = function (t) {
        a = 0; for (var i = 0; i < n.length; i++){
            var s = n[i], d = e._els[s] ? e._els[s][0] : null, l = 0; switch (s) {
                case "dhx_cal_navline": case "dhx_cal_header":
                    l = parseInt(d.style.height, 10);
                    break; case "dhx_multi_day": l = d ? d.offsetHeight - 1 : 0, r = l;
                    break; case "dhx_cal_data": var o = e.getState().mode; if (l = d.childNodes[1] && "month" != o ? d.childNodes[1].offsetHeight : Math.max(d.offsetHeight - 1, d.scrollHeight), "month" == o) { if (e.config.month_day_min_height && !t) { var h = d.getElementsByTagName("tr").length; l = h * e.config.month_day_min_height } t && (d.style.height = l + "px") } else if ("year" == o) l = 190 * e.config.year_y; else if ("agenda" == o) {
                        if (l = 0, d.childNodes && d.childNodes.length) for (var _ = 0; _ < d.childNodes.length; _++)l += d.childNodes[_].offsetHeight;
l+2<e.config.min_grid_size?l=e.config.min_grid_size:l+=2}else if("week_agenda"==o){for(var c,u,g=e.xy.week_agenda_scale_height+e.config.min_grid_size,f=0;f<d.childNodes.length;f++){u=d.childNodes[f];for(var _=0;_<u.childNodes.length;_++){for(var v=0,m=u.childNodes[_].childNodes[1],p=0;p<m.childNodes.length;p++)v+=m.childNodes[p].offsetHeight;c=v+e.xy.week_agenda_scale_height,c=1!=f||2!=_&&3!=_?c:2*c,c>g&&(g=c)}}l=3*g}else if("map"==o){l=0;for(var x=d.querySelectorAll(".dhx_map_line"),_=0;_<x.length;_++)l+=x[_].offsetHeight;
l+2<e.config.min_map_size?l=e.config.min_map_size:l+=2}else if(e._gridView)if(l=0,d.childNodes[1].childNodes[0].childNodes&&d.childNodes[1].childNodes[0].childNodes.length){for(var x=d.childNodes[1].childNodes[0].childNodes[0].childNodes,_=0;_<x.length;_++)l+=x[_].offsetHeight;l+=2,l<e.config.min_grid_size&&(l=e.config.min_grid_size)}else l=e.config.min_grid_size;if(e.matrix&&e.matrix[o])if(t)l+=2,d.style.height=l+"px";else{l=2;for(var b=e.matrix[o],y=b.y_unit,w=0;w<y.length;w++)l+=y[w].children?b.folder_dy||b.dy:b.dy;
                    } ("day" == o || "week" == o || e._props && e._props[o]) && (l += 2)
            }a += l
        } e._obj.style.height = a + "px", t || e.updateView()
    },
        d = function () { if (!e.config.container_autoresize || !i) return !0; var t = e.getState().mode; if (!t) return !0; var a = document.documentElement.scrollTop; if (s(), e.matrix && e.matrix[t] || "month" == t) { var r = window.requestAnimationFrame || window.setTimeout; r(function () { s(!0), document.documentElement.scrollTop = a }, 1) } }; e.attachEvent("onViewChange", d), e.attachEvent("onXLE", d), e.attachEvent("onEventChanged", d), e.attachEvent("onEventCreated", d),
e.attachEvent("onEventAdded",d),e.attachEvent("onEventDeleted",d),e.attachEvent("onAfterSchedulerResize",d),e.attachEvent("onClearAll",d),e.attachEvent("onBeforeExpand",function(){return i=!1,!0}),e.attachEvent("onBeforeCollapse",function(){return i=!0,!0})}()});