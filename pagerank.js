function pageRank(a, b, c, i){
    var yahoo = a
    var amazon = b
    var microsoft = c
    var epsilon = Math.pow(10, -3)
    var diffX
    var diffY
    var diffZ

    for (var j = 0; j < i; j++){
        var x = yahoo
        var y = amazon
        var z = microsoft
        var newX
        var newY
        var newZ
        newX = x * (1/2) + y * (1/2) + z * 0
        diffX = Math.abs(newX - x)
        newY = x * (1/2) + y * 0 + z * 1
        diffY = Math.abs(newY - y)
        newZ = x * 0 + y * (1/2) + z * 0
        diffZ = Math.abs(newZ - z)
        yahoo = newX
        amazon = newY
        microsoft = newZ
        if(diffX < epsilon && diffY < epsilon && diffZ < epsilon){
            console.log("Converged after " + j + " iterations.")
            break
        }
    }
    console.log("Yahoo initial: " + a)
    console.log("Yahoo final: " + yahoo)
    console.log("Amazon initial: " + b)
    console.log("Amazon final: " + amazon)
    console.log("Microsoft initial: " + c)
    console.log("Microsoft final: " + microsoft)
}
