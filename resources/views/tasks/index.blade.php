
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management | Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('tasks.index') }}" class="text-xl font-bold text-indigo-600">
                TaskFlow
            </a>

            <a href="{{ route('tasks.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg font-medium">
                + Create Task
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-10">

        <div class="mb-8">
            <p class="text-sm font-medium text-indigo-600 mb-2">
                TASK MANAGEMENT
            </p>
            <h1 class="text-3xl font-bold">My Tasks</h1>
            <p class="text-slate-500 mt-2">
                Manage and track all your tasks in one place.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="p-5 border-b border-slate-200 flex justify-between items-center">
                <h2 class="font-semibold text-lg">All Tasks</h2>

                <button type="button" id="refreshTasksBtn"
                        class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">
                    Refresh
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-500 text-sm text-center">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Id</th>
                            <th class="px-6 py-4 font-semibold">Title</th>
                            <th class="px-6 py-4 font-semibold">Description</th>
                            <th class="px-6 py-4 font-semibold">Due Date</th>
                            <th class="px-6 py-4 font-semibold">Category</th>
                            <th class="px-6 py-4 font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="tasksTableBody" class="divide-y divide-slate-100">
                        
                    </tbody>
                </table>
            </div>

            <div id="tasksMessage" class="hidden px-6 py-4 text-sm"></div>

        </div>

    </main>

    <script>
        async function getTasks(){
            const table = document.querySelector('#tasksTableBody');
            const message = document.querySelector('#tasksMessage');

            table.innerHTML = '';

            try {
                const response = await fetch('/api/tasks', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                if(!response.ok){
                    throw new Error('Response not okay');
                }

                const result = await response.json();

                result.data.forEach((task) => {
                    table.innerHTML += `
                    <tr>
                        <td class="px-6 py-10 text-center text-slate-400">${task.id}</td>
                        <td class="px-6 py-10 text-center text-slate-400">${task.title}</td>
                        <td class="px-6 py-10 text-center text-slate-400">${task.description}</td>
                        <td class="px-6 py-10 text-center text-slate-400">${task.due_date ? task.due_date.split('T')[0] : '-'}</td>
                        <td class="px-6 py-10 text-center text-slate-400">${task.category?.name ?? '-'}</td>
                        <td class="px-6 py-10 text-center text-slate-400">
                            <button type="button" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                            <button type="button" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button></td>
                    </tr>
                    `
                })
            } catch (error) {
                console.error(error);
                message.textContent = 'Failed to load tasks.';
            }
        }

        getTasks();
    </script>

</body>
</html>
