  <aside class="w-64 bg-slate-900 text-white flex flex-col h-full hidden md:flex flex-shrink-0">
      <!-- Sidebar Header / Logo -->
      <div class="h-16 flex items-center px-6 border-b border-slate-800 gap-3">
          <div class="bg-indigo-600 p-2 rounded-lg text-white">
              <i class="fa-solid fa-graduation-cap text-xl"></i>
          </div>
          <span class="text-lg font-bold tracking-wider text-indigo-400">EduAdmin</span>
      </div>

      <!-- Navigation Links -->
      <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
          <a href="#"
              class="flex items-center gap-3 px-4 py-3 text-sm font-medium bg-indigo-600 rounded-lg text-white transition-all">
              <i class="fa-solid fa-chart-pie w-5"></i> Dashboard
          </a>
          <a href="#"
              class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition-all">
              <i class="fa-solid fa-user-graduate w-5"></i> Students
          </a>
          <a href="#"
              class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition-all">
              <i class="fa-solid fa-chalkboard-user w-5"></i> Teachers
          </a>
          <a href="#"
              class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition-all">
              <i class="fa-solid fa-book w-5"></i> Courses
          </a>
          <a href="#"
              class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition-all">
              <i class="fa-solid fa-calendar-days w-5"></i> Schedule
          </a>
          <a href="#"
              class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition-all">
              <i class="fa-solid fa-credit-card w-5"></i> Fees & Finance
          </a>
          <a href="#"
              class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400 hover:bg-slate-800 hover:text-white rounded-lg transition-all">
              <i class="fa-solid fa-gear w-5"></i> Settings
          </a>
      </nav>

      <!-- Sidebar Footer / User Profile Summary -->
      <div class="p-4 border-t border-slate-800 bg-slate-950 flex items-center gap-3">
          <img class="h-9 w-9 rounded-full object-cover border-2 border-slate-700"
              src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt="Admin">
          <div class="overflow-hidden">
              <p class="text-sm font-medium truncate">Alex Morgan</p>
              <p class="text-xs text-slate-500 truncate">Super Admin</p>
          </div>
          <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="ml-auto text-slate-400 hover:text-rose-400 transition-colors">
                  <i class="fa-solid fa-right-from-bracket"></i>
              </button>
          </form>
      </div>
  </aside>
