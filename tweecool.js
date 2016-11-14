/*Name : TweeCool
 *version: 1.6
 *Description: Get the latest tweets from twitter.
 *Website: www.tweecool.com
 *Licence: No licence, feel free to do whatever you want.
 *Author: TweeCool
 */
! function(e) {
    e.fn.extend({
        tweecool: function(t) {
            function a(e) {
                var t = new Date,
                    a = Date.parse(t),
                    r = 1e3 * e,
                    i = (a - r) / 1e3,
                    n = 1,
                    o = 60,
                    s = 3600,
                    l = 86400,
                    m = 604800,
                    h = 2592e3,
                    u = 31536e3;
                return i > n && o > i ? Math.round(i / n) + " seconds ago" : i >= o && s > i ? Math.round(i / o) + " minutes ago" : i >= s && l > i ? Math.round(i / s) + " hours ago" : i >= l && m > i ? Math.round(i / l) + " days ago" : i >= m && h > i ? Math.round(i / m) + " weeks ago" : i >= h && u > i ? Math.round(i / h) + " months ago" : "over a year ago"
            }
            var r = {
                username: "CRSTNET",
                limit: 5,
                profile_image: !0,
                show_time: !0,
                show_media: !1,
                show_media_size: "thumb"
            }, t = e.extend(r, t);
            return this.each(function() {
                var r = t,
                    i = e(this),
                    n = e("<ul>").appendTo(i),
                    o = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gi,
                    s = /@+(\w+)/gi,
                    l = /#+(\w+)/gi,
                    m = "";
                e.getJSON("https://www.api.tweecool.com/?screenname=" + r.username + "&count=" + r.limit, function(t) {
                    if (t.errors || null == t) return i.html("No tweets available."), !1;
                    if (r.profile_image) var h = '<a href="https://twitter.com/' + r.username + '" target="_blank"><img src="' + t.user.profile_image_url + '" alt="' + r.username + '" /></a>';
                    else h = "";
                    e.each(t.tweets, function(e, t) {
                        if (r.show_time) var i = a(t.timestamp);
                        else var i = "";
                        m = r.show_media && t.media_url ? '<a href="https://twitter.com/' + r.username + '" target="_blank"><img src="' + t.media_url + ":" + r.show_media_size + '" alt="' + r.username + '" class="media" /></a>' : "", n.append("<li>" + h + '<div class="tweets_txt">' + t.text.replace(o, '<a href="$1" target="_blank">$1</a>').replace(s, '<a href="https://twitter.com/$1" target="_blank">@$1</a>').replace(l, '<a href="https://twitter.com/search?q=%23$1" target="_blank">#$1</a>') + m + " <span>" + i + "</span></div></li>")
                    })
                }).fail(function(e, t, a) {
                    i.html("No tweets available")
                })
            })
        }
    })
}(jQuery);
