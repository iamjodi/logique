<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Card') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Address</th>
                      <th scope="col">DoB</th>
                      <th scope="col">Member Type</th>
                      <th scope="col">Number</th>
                      <th scope="col">Type Card</th>
                      <th scope="col">Expired Date</th>
                      <th scope="col">Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $i=1;
                        foreach($data as $value): 
                    ?>
                    <tr>
                      <th scope="row"><?= $i++ ?></th>
                      <td><?= $value->address ?></td>
                      <td><?= $value->dob ?></td>
                      <td><?= $value->member_type ?></td>
                      <td><?= $value->number ?></td>
                      <td><?= $value->type_card ?></td>
                      <td><?= $value->expired_date ?></td>
                      <td><?= $value->created_at ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
