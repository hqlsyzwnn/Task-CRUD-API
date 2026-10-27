
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management | Update Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('tasks.index') }}"
               class="text-xl font-bold text-indigo-600">
                TaskFlow
            </a>

            <a href="{{ route('tasks.index') }}"
               class="text-slate-600 hover:text-indigo-600 font-medium">
                ← Back to Tasks
            </a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-6 py-10">

        <div class="mb-8">
            <p class="text-sm font-medium text-indigo-600 mb-2">
                TASK MANAGEMENT
            </p>
            <h1 class="text-3xl font-bold">Update Task</h1>
            <p class="text-slate-500 mt-2">
                Modify the details of your existing task.
            </p>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 md:p-8">

            <div id="updateTaskMessage"
                 class="hidden mb-6 rounded-lg p-4 text-sm"></div>

            <form id="updateTaskForm" class="space-y-6">

                <input type="hidden" id="task_id" name="id">

                <div>
                    <label for="title"
                           class="block text-sm font-semibold mb-2">
                        Task Title
                    </label>

                    <input type="text" id="title" name="title"
                           placeholder="Enter task title"
                           required maxlength="255"
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="description"
                           class="block text-sm font-semibold mb-2">
                        Description
                    </label>

                    <textarea id="description" name="description"
                              rows="4"
                              placeholder="Describe your task..."
                              class="w-full border border-slate-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>

                <div>
                    <label for="due_date"
                           class="block text-sm font-semibold mb-2">
                        Due Date
                    </label>

                    <input type="date" id="due_date" name="due_date"
                           required
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="category_id"
                           class="block text-sm font-semibold mb-2">
                        Category
                    </label>

                    <select id="category_id" name="category_id" required
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select a category</option>
                    </select>
                </div>

                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4 border-t border-slate-100">

                    <a href="{{ route('tasks.index') }}"
                       class="text-center border border-slate-300 hover:bg-slate-50 px-5 py-3 rounded-lg font-medium">
                        Cancel
                    </a>

                    <button type="submit" id="updateTaskBtn"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold">
                        Save Changes
                    </button>

                </div>

            </form>
        </div>

    </main>

</body>
</html>
