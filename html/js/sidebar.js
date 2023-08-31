let sidebarOpen = false;
const sidebar = document.getElementById("sidebar");
console.log(sidebar)

function openSidebar(){
  if(!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

function closeSidebar(){
  if(sidebarOpen) {
    sidebar.classList.remove("sidebar-responsive");
    sidebarOpen = false;
  }
}